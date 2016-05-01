@extends('layouts.dashboard')

@section('meta_title')
    Изменение пользователя - {{ $user->username }}
@endsection

@section('content')
    <div class="container">
        {!! Form::model($user, ['method' => 'PATCH', 'route' => ['dashboard.users.update', $user->id]]) !!}
            {!! Form::hidden('id', $user->id) !!}
            @include('dashboard.users.partials.form')
            {!! Form::submit('Сохранить') !!}
        {!! Form::close() !!}
    </div>
@endsection