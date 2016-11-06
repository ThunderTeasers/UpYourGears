<div id="nav">
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
    </nav>
    <span class="h2">О сайте</span>
    <div id="about">
        <p>Сайт создан с целью обучения людей которые хотят чуть лучше разбираться в компьютере, здесь Вы можете найти уроки на разные темы начиная от полезных мелочей в операционных системах и заканчивая программированием.</p>
        <p>Email для связи: admin@upyourgears.ru</p>
    </div>
</div>