@extends('layouts.dashboard')

@section('meta_title')
    Создание пользователя
@endsection

@section('content')
    <div class="container">
        {!! Form::open(['method' => 'POST', 'route' => 'dashboard.users.store']) !!}
            @include('dashboard.users.partials.form')
            {!! Form::submit('Создать', ['class' => 'button']) !!}
        {!! Form::close() !!}
    </div>
@endsection