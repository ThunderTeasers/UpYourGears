{!! Form::open(['method' => 'POST', 'route' => 'search']) !!}
    {!! Form::text('search', null, ['required', 'id' => 'search', 'placeholder' => 'Поиск']) !!}
{!! Form::close() !!}

<div class="right-side_block">
    <span class="right-side_block_header">Информация</span>
    <div class="right-side_block_body">
        <p>Здравствуйте. Сайт создан для сбора полезной технической информации и программ.</p>
        <p>По всем вопросам писать на почту <a href="mailto:admin@upyourgears.ru">admin@upyourgears.ru</a>.</p>
    </div>
</div>