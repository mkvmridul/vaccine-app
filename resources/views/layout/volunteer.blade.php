<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <script src="{{ asset('js/webcam.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/instascan.min.js') }}"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
        <div class="container">
            <a class="navbar-brand" href="{{ url('volunteer') }}"><b>Vaccine</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto  text-center">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Account
                        </a>
                        <div class="dropdown-menu text-center border-0" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('volunteer/profile') }}">Profile</a>
                            <form method="post" action="volunteer/signout">
                                @csrf
                                <button type="submit" class="dropdown-item btn" name="signout">SignOut</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <footer class="container">
        <div class="bg-white py-3 rounded text-center">
            <b> Copyright &copy; Volunteer</b>
        </div>
    </footer>
    </div>
</body>

</html>