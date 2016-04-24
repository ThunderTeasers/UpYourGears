<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="@yield('meta_keywords')">
    <meta name="description" content="@yield('meta_description')">
    <title>@yield('meta_title')</title>
    {{ HTML::style('public/css/app.css') }}
</head>
<body>
    @include('includes.navbar')
    <div class="container" id="wrapper">
        @include('includes.header')
        <aside id="right-side">
            @if(!Request::is('/'))
                @include('includes.breadcrumbs')
            @endif
            @yield('content')
        </aside>
        <aside id="left-side">
            @include('includes.right-side')
        </aside>
    </div>
</body>
</html>