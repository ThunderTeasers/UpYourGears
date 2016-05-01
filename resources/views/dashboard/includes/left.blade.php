<aside id="left">
    <div id="user">
        <img class="media-object img-thumbnail user-img" src="{{ URL::asset('/public/images/profiles/admin.jpg') }}">
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
                    <a href="/dashboard/articles/create">Создать</a>
                </li>
                <li>
                    <a href="/dashboard/articles">Лист</a>
                </li>
            </ul>
        </li>
        <li>
            <a><span class="link-title">Категории</span></a>
            <ul class="collapse">
                <li>
                    <a href="/dashboard/categories/create">Создать</a>
                </li>
                <li>
                    <a href="/dashboard/categories">Лист</a>
                </li>
            </ul>
        </li>
    </ul>
</aside>