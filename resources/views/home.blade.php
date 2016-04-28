@extends('layouts.master')

@section('meta_title')
    UpYourGears - полезная информация о компьютере
@endsection
@section('meta_description')
    Все, что Вы хотели бы знать о технологиях
@endsection
@section('meta_keywords')
    обзоры, на, программы, и, полезные, статьи
@endsection

@section('content')
    <span class="h1 page-header">Последние статьи</span>
    @foreach($articles as $article)
        <div class="clear">
			<span class="h3">
				<a href="/articles/{{ $article->category()->first()->slug }}/{{ $article->slug }}">{{ $article->title }}</a>
			</span>
            <div class="page-description">
                {!! $article->description !!}
            </div>
        </div>
        <br>
    @endforeach
    <br>
    <span class="h1 page-header">Блог</span>
    @foreach($blog as $b)
        <div class="clear">
			<span class="h3">
				<a href="/blog/{{ $b->slug }}">{{ $b->title }}</a>
			</span>
            <div class="page-description">
                {!! $b->description !!}
            </div>
        </div>
        <br>
    @endforeach
    <br>
    <span class="h1 page-header">Новости</span>
    @foreach($news as $new)
        <div class="clear">
			<span class="h3">
				<a href="/news/{{ $new->slug }}">{{ $new->title }}</a>
			</span>
            <div class="page-description">
                {!! $new->description !!}
            </div>
        </div>
        <br>
    @endforeach
@endsection