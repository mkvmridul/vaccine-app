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
        <h5>Volunteer SignUp</h5>

        <form method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Full Name</label>
                <input type="fullName" class="form-control @if($errors->has('fullName')){{ 'border-danger' }}@endif"
                    id="exampleInputfullName1" aria-describedby="fullNameHelp" placeholder="Enter your name.."
                    name="fullName">
                <small id="fullNameHelp" class="form-text text-muted">
                    @if($errors->has('fullName')){{ $errors->first('fullName') }}@endif
                </small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control @if($errors->has('email')){{ 'border-danger' }}@endif"
                    aria-describedby="emailHelp" placeholder="Enter email" name="email">
                <small id="emailHelp" class="form-text text-muted">
                    @if($errors->has('email')){{ $errors->first('email') }}@endif

                </small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control @if($errors->has('email')){{ 'border-danger' }}@endif"
                    id="exampleInputPassword1" placeholder="Password" name="password">
            </div>

            <div class="form-group">
                <div class="row text-right">
                    <label for="exampleInputGender1" class=" ml-3">Gender</label>
                    <div class="col-3">
                        <input class="form-check-input" type="radio" name="gender" id="gender1" value="male" checked>
                        <label class="form-check-label" for="gender1">Male </label>
                    </div>
                    <div class="col-3">
                        <input class="form-check-input" type="radio" name="gender" id="gender2" value="female">
                        <label class="form-check-label" for="gender2">Female</label>
                    </div>
                    <div class="col-3">
                        <input class="form-check-input" type="radio" name="gender" id="gender3" value="other">
                        <label class="form-check-label" for="gender3"> Other</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input type="text" class="form-control @if($errors->has('address')){{ 'border-danger' }}@endif"
                    id="exampleAddress" aria-describedby="textHelp" placeholder="Enter your Address" name="address">
                <small id="addressHelp" class="form-text text-muted">
                    @if($errors->has('address')){{ $errors->first('address') }}@endif

                </small>
            </div>
            <div class="form-group">
                <label for="quantity">Age</label>
                <input class="form-control @if($errors->has('age')){{ 'border-danger' }}@endif" type="number"
                    id="quantity" min="18" max="70" placeholder="More then or equal 18" name="age" />
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Health Condition</label>
                <textarea type="textarea" class="form-control" id="exampleHealthCondition" aria-describedby="textHelp"
                    placeholder="Enter your health condition.." name="health_condition"></textarea>
                <small id="addressHelp" class="form-text text-muted"></small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="text-dark" href="/volunteer/signin">Signin?</a>

        </form>
    </div>
</body>

</html>