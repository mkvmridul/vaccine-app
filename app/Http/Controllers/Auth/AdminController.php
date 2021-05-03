<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Volunteer;

class AdminController extends Controller
{
    public static function signin(Request $req)
    {
        if ($req->isMethod('post')) {
            if (Admin::match($req->email, $req->password)) {
                $req->session()->put('adminEmail', $req->email);
                return redirect('admin');
            } else {
                return redirect()->back()->with('msg', 'Wrong Email or Password');
            }
        } else
            return view('admin.signin');
    }
    public static function signout(Request $req)
    {
        if ($req->isMethod('get'))
            return redirect('admin/signin');

        if ($req->isMethod('post') && $req->session()->pull('adminEmail'))
            return redirect('admin/signin');
    }

    public static function home()
    {
        return redirect('admin/signin');
    }

    // public static function signin(Request $req)
    // {
    //     if ($req->isMethod('post')) {
    //         $validate = Validator::make($req->all(), ['email' => 'required|email|exists:Volunteer,email', 'password' => 'required']);
    //         if ($validate->fails()) {
    //             return  redirect()->back()->withErrors($validate->errors());
    //         } else {
    //             $data = Admin::whereEmail($req->email)->first();
    //             if ($data && Hash::check($req->password, $data->passwordHash)) {
    //                 $req->session()->put('adminEmail', $data->email);
    //                 return redirect('/volunteer');
    //             } else
    //                 return  redirect()->back()->withErrors($validate->errors());
    //         }
    //     } else
    //         return view('admin.signin');
    // }

    public static function index(Request $req)
    {
        if ($req->session()->exists('adminEmail')) {
            $data['positiveCase'] = Volunteer::whereInfected(1)->count();
            $data['totalVolunteer'] = Volunteer::count();
            if ($data['positiveCase'] >= 10) {
                $data['efficacyRate'] = Volunteer::efficacyRate();
                $data['halfDose'] = Volunteer::whereIn('dose', [0.5, '.5'])->count();
                $data['singleDose'] = Volunteer::whereIn('dose', [1, 1.0])->count();
            }
            return view('admin.index', $data);
        } else
            return redirect('admin/signin')->with('msg', 'Please SignIn First.');
    }
    public static function profile(Request $req)
    {
        if ($req->session()->has('adminEmail'))
            return view('admin.profile', ['volunteer' => Admin::whereEmail($req->session()->get('adminEmail'))->first()]);
        else
            return redirect('admin/signin');
    }
}
