<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Volunteer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use App\Models\Vaccine;

class VolunteerController extends Controller
{

    public static function result(Request $req)
    {
        $vaccine = Vaccine::whereVaccinegroup($req->group)->first();
        $volunteer = Volunteer::whereVaccinegroup($req->group)->whereDose($req->dose)->first();
        return [
            'name' => $vaccine['name'],
            'type' => $vaccine['type'],
            'vaccineGroup' => $vaccine['VaccineGroup'],
            'dose' => isset($volunteer['dose']) ? $volunteer['dose'] : 0,
            'efficacy_rate' => Volunteer::efficacyRate(),
            'result' => [
                'volunteer' => Volunteer::whereVaccinegroup($req->group)->whereDose($req->dose)->count(),
                'confirm_positive' => Volunteer::whereVaccinegroup($req->group)->whereDose($req->dose)->whereInfected(1)->count()
            ]

        ];
    }
    public static function all_result()
    {
        $A = Vaccine::whereVaccinegroup('A')->first();
        $B = Vaccine::whereVaccinegroup('B')->first();

        return [
            [
                'name' => $A['name'],
                'type' => $A['type'],
                'vaccineGroup' => $A['vaccineGroup'],
                'efficacy_rate' => Volunteer::efficacyRate(),
                'result' => [
                    'volunteer' => Volunteer::count(),
                    'confirm_positive' => Volunteer::whereVaccinegroup('A')->count()
                ]
            ],
            [
                'name' => Vaccine::whereVaccinegroup('B')->first()['name'],
                'type' => $B['type'],
                'vaccineGroup' => $B['vaccineGroup'],
                'efficacy_rate' => Volunteer::efficacyRate(),
                'result' => ['volunteer' => Volunteer::count(), 'confirm_positive' => Volunteer::whereVaccinegroup('B')->count()]
            ]
        ];
    }
    public static function home()
    {
        return redirect('volunteer/signin');
    }
    public static function positive(Request $req)
    {
        if ($req->session()->exists('volunteerEmail'))
            if ($req->positive)
                return (Volunteer::whereEmail($req->session()
                    ->get('volunteerEmail'))->update(['infected' => 1])) ? 'Report Succesfully as Positive' : 'Report Unsuccessfull.';
    }
    public static function signup(Request $req)
    {
        if ($req->isMethod('post')) {
            $validate = Validator::make($req->all(), [
                'email' => 'required|email|unique:Volunteer,email',
                'fullName' => 'required|min:4',
                'gender' => 'in:male,female,other',
                'age' => 'required|numeric|min:18',
                'address' => 'required',
                'password' => 'required',
                'health_condition' => 'nullable'
            ]);
            if ($validate->fails()) {
                return  redirect()->back()->withErrors($validate->errors());
            } else {
                $data = Volunteer::create([
                    'email' => $req->email,
                    'fullName' => ucwords($req->fullName),
                    'gender' => $req->gender,
                    'age' => $req->age,
                    'address' => ucwords($req->address),
                    'passwordHash' => Hash::make($req->password),
                    'health_control' => $req->health_condition
                ]);
                return ($data) ? redirect('volunteer/signin')->with('msg', 'Success SignUp. You recieve nasal spray.') : view('volunteer.signup');
            }
        } else
            return view('volunteer.signup');
    }

    public static function signin(Request $req)
    {
        if ($req->isMethod('post')) {
            $validate = Validator::make($req->all(), ['email' => 'required|email|exists:Volunteer,email', 'password' => 'required']);
            if ($validate->fails()) {
                return  redirect()->back()->withErrors($validate->errors());
            } else {
                $data = Volunteer::whereEmail($req->email)->first();
                if ($data && Hash::check($req->password, $data->passwordHash)) {
                    $req->session()->put('volunteerEmail', $data->email);
                    return redirect('/volunteer');
                } else
                    return  redirect()->back()->withErrors($validate->errors());
            }
        } else
            return view('volunteer.signin');
    }

    public static function index(Request $req)
    {

        if ($req->session()->exists('volunteerEmail')) {
            if ($req->isMethod('post'))
                if (in_array($req->vaccine, ['A', 'B']) && in_array($req->dose, [1, 1.0, 0.5])) {
                    $results = Volunteer::whereEmail($req->session()->get('volunteerEmail'))->update(['vaccineGroup' => $req->vaccine, 'dose' => $req->dose]);
                    return redirect()->back()->with('msg', ($results) ? 'Successfully Saved' : 'Not Successfully Saved');
                }
            return view('volunteer.index', ['infected' => Volunteer::whereEmail($req->session()->get('volunteerEmail'))->whereInfected(1)->first() ? 1 : 0]);
        } else
            return redirect('volunteer/signin')->with('msg', 'Please SignIn First.');
    }
    public static function profile(Request $req)
    {
        if ($req->session()->has('volunteerEmail'))
            return view('volunteer.profile', ['volunteer' => Volunteer::whereEmail($req->session()->get('volunteerEmail'))->first()]);
        else
            return redirect('volunteer/signin');
    }
    public static function signout(Request $req)
    {
        if ($req->isMethod('get'))
            return redirect('volunteer/signin');
        if ($req->isMethod('post')) {
            $req->session()->pull('volunteerEmail');
            return redirect('volunteer/signin');
        }
    }

    public static function verify(Request $req)
    {
        $data = json_decode($req->content, true);
        if (in_array($data['vaccine'], ['A', 'B']) && in_array($data['dose'], [1, 1.0, 0.5]))
            return (Volunteer::whereEmail($req->session()->get('volunteerEmail'))->update(['vaccineGroup' => $data['vaccine'], 'dose' => $data['dose']])) ? 'Successfully Saved' : 'Not Saved';
    }
}
