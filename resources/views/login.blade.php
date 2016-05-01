<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Логин</title>
    <link rel="stylesheet" href="/public/css/login.css">
    <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
</head>
<body>
    @if(!\Illuminate\Support\Facades\App::isLocal())
        {{ URL::forceSchema('https') }}
    @endif

    <div class="login-wrapper">
        {!! Form::open() !!}
            @include('errors.list')

            {!! Form::text('username', null, array('required', 'placeholder' => 'Имя пользователя')) !!}
            {!! Form::password('password', array('required', 'placeholder' => 'Пароль')) !!}
            {!! Form::submit('Войти', array('class' => 'button')) !!}
        {!! Form::close() !!}
    </div>
</body>
</html>