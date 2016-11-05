@extends('layouts.dashboard')

@section('meta_title')
    Создание статьи
@endsection

@section('content')
    <div class="container">
        <h1>Создание статьи</h1>
        {!! Form::model($article = new \App\Models\Article, ['method'=> 'POST', 'route' => 'dashboard.articles.store']) !!}
            @include('dashboard.articles.partials.form')
            {!! Form::submit('Сохранить', ['class' => 'btn btn-accept']) !!}
        {!! Form::close() !!}
    </div>
@endsection