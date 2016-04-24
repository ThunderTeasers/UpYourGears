@if(isset($breadcrumbs))
    {!! $breadcrumbs->generate() !!}
@else
    <ul class='breadcrumbs'>
        <li>
            <a href='/'>Главная</a>
            <span class='divider'>&gt;</span>
        </li>
        <li>
            <span>404</span>
        </li>
    </ul>
@endif