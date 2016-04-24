<div id="navbar">
    <div class="container">
        <nav>
            <ul>
                <li class="active">
                    <a href="/">Главная</a>
                </li>
                <li>
                    <a href="/articles">Статьи</a>
                </li>
                <li>
                    <a href="/news">Новости</a>
                </li>
            </ul>

            <span class="pull-right" id="navbar__user">
                @if(Auth::check())
                    Привет, <a href="{{ route('user.settings') }}" id="navbar__user__name">{{ Auth::user()->username }}</a>! | <a href="{{ route('user.logout') }}">Выйти</a>
                @else
                    <a href="{{ route('user.login') }}">Войти</a><span> | </span><a href="{{ route('user.registration') }}">Регистрация</a>
                @endif
            </span>
        </nav>
    </div>
</div>