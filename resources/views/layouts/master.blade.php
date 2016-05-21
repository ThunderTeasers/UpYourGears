<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="@yield('meta_keywords')">
    <meta name="description" content="@yield('meta_description')">
    <title>@yield('meta_title')</title>
    <link rel="stylesheet" href="/public/css/app.css">
    <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
</head>
<body>
    @if(!\Illuminate\Support\Facades\App::isLocal())
        {{ URL::forceSchema('https') }}
    @endif

    <div id="wrapper">
        @include('includes.navbar')
        <main class="container clear">
            @if(!Request::is('/'))
                @include('includes.breadcrumbs')
            @endif
            @yield('content')
        </main>
    </div>

    <script type="text/javascript" src="/public/js/all.js"></script>
    <script>
        (function(){
            console.log(uyg.getJSON("http://laravel.dev/tsconfig.json"));
        })();
    </script>
</body>
</html>