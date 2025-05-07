<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courier System</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            @if (auth()->check() && auth()->user()->isAdmin())
            <a class="navbar-brand" href="{{ route('admin.reports') }}">Courier System</a>
        @endif
            <div class="navbar-nav">
                @auth
                    @if(auth()->user()->isAdmin())
                    <a class="nav-link" href="{{ route('admin.reports') }}">Reports</a>
                        <a class="nav-link" href="{{ route('packages.index') }}">Packages</a>

                    @else
                        <a class="nav-link" href="{{ route('courier.dashboard') }}">Dashboard</a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link">Logout</button>
                    </form>
                @else
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                @endauth
                <a class="nav-link" href="{{ route('track.form') }}">Track Package</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
