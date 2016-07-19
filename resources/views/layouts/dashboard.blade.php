<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('meta_title')</title>
    <link rel="stylesheet" href="/public/css/admin.css">
    <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
</head>
<body>
    @if(!\Illuminate\Support\Facades\App::isLocal())
        {{ URL::forceSchema('https') }}
    @endif

    <aside>
        @include('dashboard.includes.left')
    </aside>
    <main>
        <div id="right__wrapper">
            @yield('content')
        </div>
    </main>

    <script type="text/javascript" src="/public/js/tinymce/tinymce.min.js"></script>
</body>
</html>