<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>@yield('meta_title')</title>
    <link rel="stylesheet" href="{{ URL::to('/public/css/user.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
</head>
<body>
    @if(!\Illuminate\Support\Facades\App::isLocal())
        {{ URL::forceSchema('https') }}
    @endif

    @include('user.includes.left')
    <aside id="right">
        <div id="right__wrapper">
            @yield('content')
        </div>
    </aside>
</body>
</html>