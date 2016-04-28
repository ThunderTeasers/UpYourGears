<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/public/css/admin.css">
</head>
<body>
    {{ URL::forceSchema('https') }}

    @include('dashboard.includes.left')
    <aside id="right">
        <div id="right__wrapper">
            @yield('content')
        </div>
    </aside>
</body>
</html>