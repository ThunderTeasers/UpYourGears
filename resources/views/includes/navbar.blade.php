<header id="navbar">
    <div class="container">
        <div id="navbar__header">
            <button type="button" id="dropdown">
                <img src="/public/images/common/menu.png" alt="">
            </button>
            <a href="/" class="h3">UpYourGears</a>
        </div>
        <nav id="menu">
            <ul>
                <li class="active">
                    <a href="/">Главная</a>
                </li>
                <li>
                    <a href="/articles">Статьи</a>
                </li>
                <li>
                    <a href="/programs">Программы</a>
                </li>
                <li>
                    <a href="/news">Новости</a>
                </li>
                <li>
                    <a href="/sites">Сайты</a>
                </li>
                <li>
                    <a href="/blog">Блог</a>
                </li>
            </ul>
        </nav>
    </div>
</header>

{{--<span class="pull-right" id="navbar__user">--}}
{{--@if(Auth::check())--}}
{{--Привет, <a href="{{ route('user.settings') }}" id="navbar__user__name">{{ Auth::user()->username }}</a>! | <a href="{{ route('user.logout') }}">Выйти</a>--}}
{{--@else--}}
{{--<a href="{{ route('user.login') }}">Войти</a><span> | </span><a href="{{ route('user.registration') }}">Регистрация</a>--}}
{{--@endif--}}
{{--</span>--}}