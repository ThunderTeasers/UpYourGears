<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/public/css/admin.css">
    <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
</head>
<body>
    @if(!\Illuminate\Support\Facades\App::isLocal())
        {{ URL::forceSchema('https') }}
    @endif

    @include('dashboard.includes.left')
    <aside id="right">
        <div id="right__wrapper">
            @yield('content')
        </div>
    </aside>

    <script type="text/javascript" src="/public/js/tinymce/tinymce.min.js"></script>
</body>
</html>