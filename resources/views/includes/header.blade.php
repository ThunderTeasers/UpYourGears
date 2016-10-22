<header id="header">
    <div id="left">
        <a id="mobile-menu"></a>
        <h1><a href="/">UpYourGears</a></h1>
    </div>
    <div id="right">
        <nav>
            <ul>
                <li>
                    <form method="POST" action="/search" accept-charset="UTF-8">
                        {{ Form::token() }}
                        <input required="required" id="search" name="search" type="text">
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</header>