<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>@yield('meta_title')</title>
    {{ HTML::style('public/css/app.css') }}
</head>
<body>
<div class="container" id="wrapper">
    @yield('content')
</div>
</body>
</html>