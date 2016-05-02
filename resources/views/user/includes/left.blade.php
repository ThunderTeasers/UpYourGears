<aside id="left">
    <div id="user">
        <img class="media-object img-thumbnail user-img" src="{{ URL::asset('/public/uploads/'.$user->image) }}">
        <div id="user__body">
            <span id="user__username">{{ $user->username }}</span>
            <ul id="user__info">
                <a href="/dashboard/logout">Выход</a>
            </ul>
        </div>
    </div>
    <ul id="menu">
        <li class="nav-divider"></li>
        <li>
            <a href="#"><span class="link-title">Статьи</span></a>
        </li>
        <li>
            <a href="#"><span class="link-title">Категории</span></a>
        </li>
    </ul>
</aside>