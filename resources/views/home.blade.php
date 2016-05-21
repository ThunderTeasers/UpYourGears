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
    <div itemscope itemtype="http://schema.org/Article">
        <meta itemprop="inLanguage" content="ru-RU"/>
        <meta itemprop="description" content="Все, что Вы хотели бы знать о технологиях!"/>
    </div>

    @foreach($articles as $article)
        <div class="clear">
			<span class="h3">
				<a href="/{{ $article->category()->first()->slug }}/{{ $article->slug }}">{{ $article->title }}</a>
			</span>
            <div class="page-description">
                {!! $article->description !!}
            </div>
        </div>
        <br>
    @endforeach
@endsection