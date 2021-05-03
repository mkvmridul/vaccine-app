<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <script src="{{ asset('js/webcam.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
        <div class="container">
            <a class="navbar-brand" href="{{ url('admin') }}"><b>Vaccine</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto  text-center">
                    <li class="nav-item">
                        <form method="post" action="admin/signout" class="nav-link mt-0 mb-0">
                            @csrf
                            <button type="submit" class="btn" name="signout">SignOut</button>
                        </form>
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