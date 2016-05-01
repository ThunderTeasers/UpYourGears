@extends('layouts.dashboard')

@section('meta_title')
    Изменение статьи - {{ $article->title }}
@endsection

@section('content')
    <div class="container">
        {!! Form::model($article, ['method' => 'PATCH', 'route' => ['dashboard.articles.update', $article->id]]) !!}
        {!! Form::hidden('id', $article->id) !!}
        @include('dashboard.articles.partials.form')
        {!! Form::submit('Сохранить') !!}
        {!! Form::close() !!}
    </div>
@endsection