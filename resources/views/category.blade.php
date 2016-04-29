@extends('layouts.master')

@section('meta_title'){{ $category->meta_title }}@endsection
@section('meta_description'){{ $category->meta_description }}@endsection
@section('meta_keywords'){{ $category->meta_keywords }}@endsection

@section('content')
    <div itemscope itemtype="http://schema.org/Blog">
        <meta itemprop="inLanguage" content="ru-RU"/>
        <div class="page-header">
            <span class="h1" itemprop="name">{{ $category->title }}</span>
        </div>
        <div class="page-description" itemprop="description">
            {!! $category->description !!}
        </div>

        @foreach($articles as $article)
            <div class="category_article clear" itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">
                <span class="page-header h2">
                    <a href="{{ $category->slug.'/'.$article->slug }}" itemprop="name">{{ $article->title }}</a>
                    <meta itemprop="datePublished" content="{{ \Jenssegers\Date\Date::parse($article->created_at)->format('Y-m-d') }}"/>
                    <span class="date">{{ \Jenssegers\Date\Date::parse($article->created_at)->format('j F Y') }}</span>
                </span>
                <div class="page-description" itemprop="description">
                    {!! $article->description !!}
                </div>
            </div>
        @endforeach
        {{ $articles->render() }}
    </div>
    <br>
@endsection