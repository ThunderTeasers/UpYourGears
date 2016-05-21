<header id="navbar" class="clear">
    <div class="container">
        <div id="navbar__header">
            <button type="button" id="dropdown">
                <img src="/public/images/common/menu.png" alt="">
            </button>
            <a href="/" class="h3">UpYourGears</a>
        </div>
        <nav id="menu">
            <span id="logo"><a href="/" title="UpYourGears">UpYourGears</a></span>
            <ul>
                <li class="{{ \App\Helpers\Navbar::isActive('articles') }}">
                    <a href="/articles" title="Статьи">Статьи</a>
                </li>
                <li class="{{ \App\Helpers\Navbar::isActive('programs') }}">
                    <a href="/programs" title="Программы">Программы</a>
                </li>
                <li class="{{ \App\Helpers\Navbar::isActive('news') }}">
                    <a href="/news" title="Новости">Новости</a>
                </li>
                <li class="{{ \App\Helpers\Navbar::isActive('sites') }}">
                    <a href="/sites" title="Сайты">Сайты</a>
                </li>
                <li class="{{ \App\Helpers\Navbar::isActive('blog') }}">
                    <a href="/blog" title="Блог">Блог</a>
                </li>
                <li class="{{ \App\Helpers\Navbar::isActive('about') }}">
                    <a href="/about" title="Контакты">Контакты</a>
                </li>
            </ul>
        </nav>
    </div>
</header>