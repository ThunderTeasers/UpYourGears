<ul>
    <li class="block-user">
        ThunderTeasers
    </li>
    <li class="delimiter"></li>
    <li>
        <a href="{{ URL::route('dashboard.articles.index') }}" class="{{ (\Request::route()->getName() === 'dashboard.articles.index') ? 'active' : '' }}">
            <i class="fa fa-fw fa-file"></i><span class="link-title">Статьи</span>
        </a>
    </li>
    <li>
        <a href="{{ URL::route('dashboard.categories.index') }}" class="{{ (\Request::route()->getName() === 'dashboard.categories.index') ? 'active' : '' }}">
            <i class="fa fa-fw fa-folder-open"></i><span class="link-title">Категории</span>
        </a>
    </li>
</ul>