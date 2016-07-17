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
        <meta itemprop="name" content="UpYourGears">
        <meta itemprop="description" content="Все, что Вы хотели бы знать о технологиях!"/>
    </div>

    <span class="h1 page-header">Свежие статьи</span>
    @foreach($articles as $article)
        <div class="category-article clearfix">
			<span class="h2">
				<a href="/articles/{{ $article->category()->first()->slug }}/{{ $article->slug }}">{{ $article->title }}</a>
			</span>
            <div class="page-description">
                {!! $article->description !!}
            </div>
        </div>
    @endforeach
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- After articles -->
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-3272279935644302"
         data-ad-slot="3789715878"
         data-ad-format="auto"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    <br>
    <span class="h1 page-header">Свежие обзоры программ</span>
    @foreach($programs as $program)
        <div class="category-article clearfix">
			<span class="h2">
				<a href="/programs/{{ $program->category()->first()->slug }}/{{ $program->slug }}">{{ $program->title }}</a>
			</span>
            <div class="page-description">
                {!! $program->description !!}
            </div>
        </div>
    @endforeach
    <br>
    <span class="h1 page-header">Свежие записи в блоге</span>
    @foreach($blog as $b)
        <div class="category-article clearfix">
			<span class="h2">
				<a href="/blog/{{ $b->slug }}">{{ $b->title }}</a>
			</span>
            <div class="page-description">
                {!! $b->description !!}
            </div>
        </div>
    @endforeach
    <br>
    <span class="h1 page-header">Свежие новости</span>
    @foreach($news as $new)
        <div class="category-article clearfix">
			<span class="h2">
				<a href="/news/{{ $new->slug }}">{{ $new->title }}</a>
			</span>
            <div class="page-description">
                {!! $new->description !!}
            </div>
        </div>
    @endforeach
    <br>
@endsection