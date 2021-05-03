@extends('layout.volunteer')
@section('content')
<div class="container">
    <h2 class="mt-5">Profile</h2>
    <table class="table mt-5 border rounded-5">
        @isset ($volunteer->fullName)
        <tr>
            <th scope="col">Name</th>
            <td scope="col">{{ $volunteer->fullName }}</td>
        </tr>
        @endisset
        @isset ($volunteer->email)
        <tr>
            <th scope="col">Email</th>
            <td scope="col">{{ $volunteer->email }}</td>
        </tr>
        @endisset
        @isset ($volunteer->gender)
        <tr>
            <th scope="col">Gender</th>
            <td scope="col">{{ ucfirst($volunteer->gender) }}</td>
        </tr>
        @endisset
        @isset ($volunteer->age)
        <tr>
            <th scope="col">Age</th>
            <td scope="col">{{ $volunteer->age }}</td>
        </tr>
        @endisset
        @isset ($volunteer->address)
        <tr>
            <th scope="col">Address</th>
            <td scope="col">{{ $volunteer->address }}</td>
        </tr>
        @endisset
        @isset ($volunteer->health_condition)
        <tr>
            <th scope="col">Health Condition</th>
            <td scope="col">{{ $volunteer->health_condition }}</td>
        </tr>
        @endisset

        @isset ($volunteer->vaccineGroup)
        <tr>
            <th scope="col">Vaccine Group</th>
            <td scope="col">{{ $volunteer->vaccineGroup }}</td>
        </tr>
        @endisset

        @isset ($volunteer->dose)
        <tr>
            <th scope="col">Dose</th>
            <td scope="col">{{ $volunteer->dose }}</td>
        </tr>
        @endisset

        @isset ($volunteer->infected)
        <tr>
            <th scope="col">Infected</th>
            <td scope="col">{{ $volunteer->infected }}</td>
        </tr>
        @endisset

        </tbody>
    </table>
</div>
@endsection