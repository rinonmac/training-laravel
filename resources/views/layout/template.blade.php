<!DOCTYPE html>
<html lang="en">
<head>
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ mix ('/css/app.css')}}">
    {{-- JS & JQuery --}}
    <script src="{{ asset('/js/app.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
</head>
<body>
    {{-- NavBar --}}
    <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="/docs/4.3/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        User Management Engine
    </a>
</nav>
    {{-- ISI --}}
    <div class="container-fluid" id="isi">
        @yield('isi')
    </div>
    {{-- Footer --}}
    <footer class="card-footer text-muted" style="text-align:center;">Copyright &copy; 2019 Greninja573 inc.</footer>
</body>
</html>