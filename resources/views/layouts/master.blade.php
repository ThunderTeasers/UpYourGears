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

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-71898913-2', 'auto');
        ga('send', 'pageview');
    </script>
</head>
<body>
<!--LiveInternet counter-->
<script type="text/javascript"><!--
    new Image().src = "//counter.yadro.ru/hit?r" +
            escape(document.referrer) + ((typeof(screen) == "undefined") ? "" :
            ";s" + screen.width + "*" + screen.height + "*" + (screen.colorDepth ?
                    screen.colorDepth : screen.pixelDepth)) + ";u" + escape(document.URL) +
            ";" + Math.random();//--></script><!--/LiveInternet-->
    @if(!\Illuminate\Support\Facades\App::isLocal())
        {{ URL::forceSchema('https') }}
    @endif

    <div id="wrapper">
        <!--noindex-->
        @include('includes.navbar')
        <!--/noindex-->
        <main class="container clear">
            @if(!Request::is('/'))
                @include('includes.breadcrumbs')
            @endif
            @yield('content')
        </main>
    </div>

    <script type="text/javascript" src="/public/js/all.js"></script>
</body>
</html>