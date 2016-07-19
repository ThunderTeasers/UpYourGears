<span class="h2">Категории</span>
<nav>
    <ul>
    @foreach($categories as $category)
        <li>
            <a href="/{{ $category->slug }}/" class="{{ \App\Helpers\Navbar::isActive($category->slug, false) }}">{{ $category->title }}</a>
            @if(count($category->childs()) > 0)
                <ul>
                @foreach($category->childs() as $child)
                    <li><a class="{{ \App\Helpers\Navbar::isActive("/".$category->slug."/".$child->slug, true) }}" href="/{{ $category->slug }}/{{ $child->slug }}">{{ $child->title }}</a></li>
                @endforeach
                </ul>
            @endif
        </li>
    @endforeach
    </ul>

    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- Left sidebar -->
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-3272279935644302"
         data-ad-slot="4346289077"
         data-ad-format="auto"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
</nav>