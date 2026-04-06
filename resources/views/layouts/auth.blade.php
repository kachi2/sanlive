<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Login') - {{ $settings->site_name ?? 'Sanlive Pharmacy' }}</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { background: #eee; width: 100%; height: 100%; }
        .auth-container {
            margin: 80px auto;
            width: 500px;
            max-width: 95%;
            background: #fff;
            position: relative;
            border-radius: 10px;
            padding: 50px;
        }
        .auth-container input { border-radius: 10px; }
        .auth-container button { width: 100%; border-radius: 10px; height: 40px; }
    </style>
</head>
<body>
    <div class="auth-container">
        @yield('content')
    </div>
</body>
</html>
