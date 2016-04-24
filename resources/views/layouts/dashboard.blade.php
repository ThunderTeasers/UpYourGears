<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    {{ HTML::style('public/css/admin.css') }}
</head>
<body>
    @include('dashboard.includes.left')
    <aside id="right">
        <div id="right__wrapper">
            @yield('content')
        </div>
    </aside>
</body>
</html>