@extends('layouts.dashboard')

@section('meta_title')
    Создание статьи
@endsection

@section('content')
    <div class="container">
        {!! Form::open(['method'=> 'POST', 'route' => 'dashboard.articles.store']) !!}
            @include('dashboard.articles.partials.form')
            {!! Form::submit('Сохранить', ['class' => 'button']) !!}
        {!! Form::close() !!}
    </div>
@endsection