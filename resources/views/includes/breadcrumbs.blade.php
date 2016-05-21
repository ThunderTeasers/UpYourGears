@if(isset($breadcrumbs))
    {!! $breadcrumbs->generate() !!}
@else
    <ul class='breadcrumbs clear' itemscope itemtype="http://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a itemprop="item" href="/">
                <span itemprop="name">Главная</span>
                <meta itemprop="position" content="1">
            </a>
            <span class='divider'>&gt;</span>
        </li>
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <span itemprop="item">
                <span itemprop="name">404</span>
                <meta itemprop="position" content="2">
            </span>
        </li>
    </ul>
@endif