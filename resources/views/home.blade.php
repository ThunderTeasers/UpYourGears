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
    <h2 class="h2">Последние статьи</h2>
    @foreach($articles as $article)
        <div class="items-row clear">
			<span class="h3">
				<a href="/articles/{{ $article->category()->first()->slug }}/{{ $article->slug }}">{{ $article->title }}</a>
			</span>
            <div class="page-description">
                {!! $article->description !!}
            </div>
        </div>
    @endforeach
    <h2 class="h2">Новости</h2>
    @foreach($news as $new)
        <div class="items-row clear">
			<span class="h3">
				<a href="/news/{{ $new->slug }}">{{ $new->title }}</a>
			</span>
            <div class="page-description">
                {!! $new->description !!}
            </div>
        </div>
    @endforeach
@endsection