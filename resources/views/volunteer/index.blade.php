@extends('layout.volunteer')
@section('content')
<div class="container">
    <h2 class="mt-5">Dashboard</h2>
    @if(!$infected)
    <div>
        Report as COVID Positive
        <button type="submit" id='positive' name="positive" class="btn btn-danger shadow">
            Click here
        </button>
    </div>
    @endif

    <div class="row mt-5">
        <div class="col-6">
            <h5>Using WebCam</h5>
        </div>
        <div class="col-1">
        </div>
        <div class="col-5">
            <h5>Enter Manually</h5>
        </div>
    </div>
    <div class="row">

        <div class="col-6">
            <video id="preview" class="p-1 border shadow" style="width: 100%"></video>
            <button id='instaStop' class="btn btn-danger">Cam Stop</button>
            <button id='instaStart' class="btn btn-success">Cam Start</button>
        </div>

        <div class="col-1">Or</div>
        <div class="col-5">
            <form method="post">
                @csrf
                <table class="table">
                    <tr>
                        <th scope="col" class="border-0">Group</th>
                        <td scope="col" class="  border-0">
                            <select name="vaccine" class="form-control">
                                <option value="A">A</option>
                                <option value="B">B</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col" class="border-0">Dose</th>
                        <td scope="col" class="border-0">
                            <select name="dose" class="form-control">
                                <option value="1">1 (Single)</option>
                                <option value="0.5">0.5 (Half)</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-primary shadow">Submit</button>
            </form>

        </div>

    </div>


    @if(Session::has('msg'))
    <div id='data-response' class=" alert alert-success">
        {{ Session::get('msg') }}
    </div>
    @endif
    <script>
        $("#positive").click(function () {
    $.ajax({
        type: "get",
        url: "/volunteer/positive",
        data: { positive: 1 },
        success: function (data) {
            if (data != "") alert(data);
            else alert("Empty");
        },
    });
});
    </script>
    <script src="{{ asset('js/qrscan.js') }}"></script>
    @endsection