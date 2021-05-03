@extends('layout.admin')
@section('content')
<div class="container">
    <h2 class="mt-5">Dashboard</h2>

    <table class="table mt-5 border rounded-5">
        <tr>
            <th scope="col">Number of Volunteer</th>
            <td scope="col">{{ $totalVolunteer }}</td>
        </tr>

        <tr>
            <th scope="col">Positive Cases</th>
            <td scope="col">{{ $positiveCase }}</td>
        </tr>
        @isset($efficacyRate)
        <tr>
            <th scope="col">Efficacy Rate</th>
            <td scope="col">{{$efficacyRate}}</td>
        </tr>
        @endisset
        @isset($singleDose)
        <tr>
            <th scope="col">Single Dose</th>
            <td scope="col">{{$singleDose}}</td>
        </tr>
        @endisset
        @isset($halfDose)
        <tr>
            <th scope="col">Half Dose</th>
            <td scope="col">{{ $halfDose }}</td>
        </tr>
        @endisset

        </tbody>
    </table>

    @if(Session::has('msg'))
    <div id='data-response' class=" alert alert-success">
        {{ Session::get('msg') }}
    </div>
    @endif
    @endsection