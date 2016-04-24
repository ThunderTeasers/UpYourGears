<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    {{ HTML::style('public/css/login.css') }}
</head>
<body>
<div class="login-wrapper">
    {!! Form::open(['method' => 'POST', 'route' => 'user.registration']) !!}
        @if(count($errors) > 0)
            <div class="danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {!! Form::text('username', null, array('required', 'placeholder' => 'Имя пользователя')) !!}
        {!! Form::email('email', null, array('required', 'placeholder' => 'Email')) !!}
        {!! Form::password('password', array('required', 'placeholder' => 'Пароль')) !!}
        {!! Form::password('password_check', array('required', 'placeholder' => 'Повтор пароля')) !!}
        <div id="answer">
            <span>{{ $a.' + '.$b }} = </span>
            {!! Form::text('answer', null, ['placeholder' => 'Ответ']) !!}
        </div>
        {!! Form::hidden('a', $a) !!}
        {!! Form::hidden('b', $b) !!}
        {!! Form::submit('Регистрация', array('class' => 'button')) !!}
    {!! Form::close() !!}
</div>
</body>
</html>