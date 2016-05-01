<aside id="left">
    <div id="user">
        <img class="media-object img-thumbnail user-img" src="{{ URL::asset('/public/uploads/'.$user->image) }}">
        <div id="user__body">
            <span id="user__username">{{ Auth::user()->username }}</span>
            <ul id="user__info">
                <a href="/dashboard/logout">Выход</a>
            </ul>
        </div>
    </div>
    <ul id="menu">
        <li class="nav-divider"></li>
        <li>
            <a><span class="link-title">Статьи</span></a>
            <ul class="collapse">
                <li>
                    <a href="{{ URL::route('dashboard.articles.create') }}">Создать</a>
                </li>
                <li>
                    <a href="{{ URL::route('dashboard.articles.index') }}">Лист</a>
                </li>
            </ul>
        </li>
        <li>
            <a><span class="link-title">Категории</span></a>
            <ul class="collapse">
                <li>
                    <a href="{{ URL::route('dashboard.categories.create') }}">Создать</a>
                </li>
                <li>
                    <a href="{{ URL::route('dashboard.categories.index') }}">Лист</a>
                </li>
            </ul>
        </li>
        <li>
            <a><span class="link-title">Теги</span></a>
            <ul class="collapse">
                <li>
                    <a href="{{ URL::route('dashboard.tags.create') }}">Создать</a>
                </li>
                <li>
                    <a href="{{ URL::route('dashboard.tags.index') }}">Лист</a>
                </li>
            </ul>
        </li>
        <li>
            <a><span class="link-title">Пользователи</span></a>
            <ul class="collapse">
                <li>
                    <a href="{{ URL::route('dashboard.users.create') }}">Создать</a>
                </li>
                <li>
                    <a href="{{ URL::route('dashboard.users.index') }}">Лист</a>
                </li>
            </ul>
        </li>
    </ul>
</aside>