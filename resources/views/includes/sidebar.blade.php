<span class="h2">Категории</span>
<nav>
    <ul>
    @foreach($categories as $category)
        <li>
            <a href="/{{ $category->slug }}/" class="{{ \App\Helpers\Navbar::isActive($category->slug) }}">{{ $category->title }}</a>
            @if(count($category->childs()) > 0)
                <ul>
                @foreach($category->childs() as $child)
                    <li><a href="/{{ $category->slug }}/{{ $child->slug }}">{{ $child->title }}</a></li>
                @endforeach
                </ul>
            @endif
        </li>
    @endforeach
    </ul>
</nav>