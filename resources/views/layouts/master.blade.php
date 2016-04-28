<!DOCTYPE html>
<html lang="en">
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
    {{ URL::forceSchema('https') }}

    @include('includes.navbar')
    <div class="container clear" id="wrapper">
        @include('includes.header')
        <aside id="left-side">
            @if(!Request::is('/'))
                @include('includes.breadcrumbs')
            @endif
            @yield('content')
        </aside>
        <aside id="right-side">
            @include('includes.right-side')
        </aside>
    </div>

    <script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');ga('create', 'UA-71898913-2', 'auto');ga('send', 'pageview');</script>
    <script type="text/javascript" src="/public/js/all.js"></script>
</body>
</html>