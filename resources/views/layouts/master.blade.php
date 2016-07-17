<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="@yield('meta_keywords')">
    <meta name="description" content="@yield('meta_description')">
    <title>@yield('meta_title')</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
</head>
<body>
    @if(!\Illuminate\Support\Facades\App::isLocal())
        {{ URL::forceSchema('https') }}
    @endif
    <!--noindex-->
    @include('includes.header')
    <!--/noindex-->
    <main>
        <!--noindex-->
        <aside id="sidebar">
            @include('includes.sidebar')
        </aside>
        <!--/noindex-->
        <aside id="content">
            @yield('content')
        </aside>
    </main>
    <script type="text/javascript" src="/public/js/all.js"></script>
</body>
</html>