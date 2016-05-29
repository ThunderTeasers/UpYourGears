<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="@yield('meta_keywords')">
    <meta name="description" content="@yield('meta_description')">
    <title>@yield('meta_title')</title>
    <style>*{margin:0;padding:0;outline:none;font-family:Arial,Helvetica,sans-serif}a{color:#2590ff;text-decoration:none}a:hover{text-decoration:underline}p{padding-top:8px;padding-bottom:8px}body,html{height:100%}body,code{color:#242424}code{border:1px solid #2a2a2a;background-color:#f2f2f2;padding-left:3px;padding-right:3px}.container{padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto}@media (min-width:768px){.container{width:750px}}@media (min-width:992px){.container{width:980px}}.h1,.h2,.h3{font-family:Helvetica Neue,Helvetica,Arial,sans-serif;display:block;color:#242424;font-weight:700}h2,h3,h4,h5,h6{margin:12px 0;color:#2590ff}h1{color:#242424;margin:12px 0}.normal-pre{border:1px solid #242424;color:#242424;padding:5px;margin-top:10px;margin-bottom:10px}.h1 a,.h2 a,.h3 a{color:#2590ff}.h1 a:hover,.h2 a:hover,.h3 a:hover{text-decoration:underline}.h1{font-size:26px;line-height:28px}.h1,.h2{margin-bottom:12px}.h2{font-size:24px;line-height:24px}.h3{font-size:22px;margin-bottom:8px}.clear:after{visibility:hidden;display:block;font-size:0;content:" ";clear:both;height:0}.pull-right{float:right}.callout{padding:10px;margin:10px 0;border:1px solid #a5a5a5;border-left-width:5px}.callout .h3{color:#242424;font-weight:700}.callout-info{border-left-color:#1b809e}.callout-danger{border-left-color:#ce4844}#navbar{min-height:36px;line-height:36px;margin-bottom:30px;padding-top:7px}#navbar ul{list-style:none}#navbar ul li{float:left;padding-right:8px}#navbar ul li:not(:first-child){padding-left:8px}#navbar ul li.active a{text-decoration:underline;font-weight:700}#navbar ul li a{color:#242424;display:block;text-decoration:none;font-size:18px}#navbar ul li a:hover{text-decoration:underline}#navbar .open-menu{display:block!important}#navbar #logo{float:left;font-size:28px;border-right:1px solid #a5a5a5;margin-right:19px;padding-right:19px}#navbar #logo a{color:#242424}#navbar input[type=text]{float:right;border:1px solid #2a2a2a;padding:6px;margin-top:3px}#navbar .container #navbar__header button{position:relative;top:-7px;float:right;background:transparent none;border:1px solid transparent}#navbar .container #navbar__header button img{width:32px;height:32px}#navbar #navbar__header{display:none}@media screen and (max-width:766px){#navbar #menu,#navbar #menu #logo{display:none}#navbar #menu #search{margin-top:10px;float:left}#navbar ul li{width:100%;padding-left:0!important}#navbar ul:after{visibility:hidden;display:block;font-size:0;content:" ";clear:both;height:0}#navbar #navbar__header{display:block}#navbar #navbar__header button{margin-top:6px}#navbar #dropdown{display:block}}#wrapper_header{margin-top:30px;margin-bottom:10px}#wrapper_header h1{font-size:60px;font-weight:400;color:#d55800;font-family:Helvetica Neue,Helvetica,Arial,sans-serif}#wrapper_header p{font-size:20px;font-weight:200;line-height:27px;color:#a5a5a5}@media screen and (max-width:766px){#wrapper_header h1,#wrapper_header p{display:none}}.breadcrumbs{list-style:none;margin:0 0 30px;display:block}.breadcrumbs li{float:left;font-size:16px}.breadcrumbs li a span{color:#242424;font-weight:400}.breadcrumbs li a span:hover{text-decoration:underline}.breadcrumbs li .divider{padding:0 5px;color:#b7b7b7}.breadcrumbs li span{color:#242424;font-weight:700}.page-header{margin-bottom:10px}.page-description{color:#2a2a2a;font-size:20px;margin-bottom:20px}.date{color:#a5a5a5;display:block;font-size:12px}.category_article:not(:last-child){margin-bottom:40px}.category-count{float:right;width:20px;text-align:center;font-size:20px;font-weight:700;color:#242424}iframe,main img:not(.article-logo){border:none;box-shadow:0 0 15px 5px rgba(0,0,0,.75);margin-top:15px;margin-bottom:15px}main ol li,main ul:not(.breadcrumbs):not(.tags) li{margin-left:30px;padding-bottom:4px;padding-top:4px}.article-logo{float:left;margin-bottom:10px;margin-right:20px}#wrapper{min-height:100%}ul.pagination{list-style:none;padding:0;text-align:center;font-size:20px;line-height:28px;margin:40px 0 20px}ul.pagination li{display:inline-block;width:28px;height:28px}ul.pagination li:not(:last-child){border-right:none}ul.pagination li.disabled{color:#a5a5a5}ul.pagination li.active{color:#242424}ul.pagination li a,ul.pagination li span{display:block}ul.pagination li span{font-weight:700}#image-holder{position:fixed;bottom:0;right:0;top:0;left:0;width:auto;height:auto;display:block;overflow:hidden;z-index:8010;background-color:rgba(0,0,0,.5)}#image-holder img{border:none;margin:auto;display:block;left:50%;top:50%;position:absolute;box-shadow:0 0 15px 5px rgba(0,0,0,.75)}pre{padding:0 3px 2px;font-family:Monaco,Menlo,Consolas,Courier New,monospace;color:#333;display:block;margin:0 0 30px;font-size:18px;line-height:20px;word-break:break-all;word-wrap:break-word;white-space:pre}pre.prettyprint{margin-bottom:20px}.pre-scrollable{max-height:340px;overflow-y:scroll}.com{color:#424242}.lit{color:#195f91}.clo,.opn,.pun{color:#545e5e}.fun{color:#dc322f}.atv,.str{color:#d44950}.kwd,.prettyprint .tag{color:#2b5d89}.atn,.dec,.typ,.var{color:#478fba}.pln{color:#242424}.prettyprint{padding:10px 15px;border:1px solid #a5a5a5}footer{height:49px;border-top:1px solid #d55800;background-color:#242424;line-height:49px;text-align:center;color:#a5a5a5}.spoiler.spoiler-open:before{background:url(/public/images/common/spoiler.png) 0 100% no-repeat}.spoiler:before{display:block;float:left;background:url(/public/images/common/spoiler.png) 0 0 no-repeat;width:16px;height:16px;content:' '}.spoiler .spoiler__head{color:#d55800;text-decoration:underline;cursor:pointer}.spoiler .spoiler__body{margin-top:5px;margin-bottom:10px;display:none;border:1px solid #d55800;background-color:#242424;padding:5px}.tags{list-style:none}.tags li{float:left;text-decoration:underline dotted red}.tags li:not(:last-child){margin-right:5px}.tags li a{color:#242424;font-weight:700;display:block}#tags-list a{color:#a5a5a5;text-decoration:underline;display:inline-block;margin-right:3px;margin-top:3px}</style>
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