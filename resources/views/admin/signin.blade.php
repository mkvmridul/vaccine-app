<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">
    <title>Document</title>
</head>

<body>
    <div class="container mt-5">
        <h5>Admin SignIn</h5>
        <form method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control @if($errors->has('email')){{ 'border-danger' }}@endif"
                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                <small id="emailHelp" class="form-text text-muted">
                    @if($errors->has('email')){{ $errors->first('email') }}@endif
                </small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password"
                    class="form-control @if($errors->has('password')){{ 'border-danger' }}@endif"
                    id="exampleInputPassword1" placeholder="Password">
                <small id="passwordHelp" class="form-text text-muted">
                    @if($errors->has('password')){{ $errors->first('password') }}@endif
                </small>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @if (Session::has('msg'))
        <div class="alert alert-danger text-center">
            {{ Session::get('msg') }}
        </div>
        @endif
    </div>



</body>

</html>