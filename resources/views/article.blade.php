@extends('layouts.master')

@section('meta_title'){{ $article->meta_title }}@endsection
@section('meta_description'){{ $article->meta_description }}@endsection
@section('meta_keywords'){{ $article->meta_keywords }}@endsection

@section('content')
    <div class="clearfix" itemscope itemtype="http://schema.org/BlogPosting">
        <meta itemprop="inLanguage" content="ru-RU"/>
        <div class="page-header">
            <h1 itemprop="headline">{{ $article->title }}</h1>
            <meta itemprop="datePublished" content="{{ \Jenssegers\Date\Date::parse($article->created_at)->format('Y-m-d') }}"/>
        </div>
        <div class="page-description">
            <div itemprop="description">
                {!! $article->description !!}
            </div>
            <div itemprop="articleBody" class="article-body">
                {!! $article->body !!}
            </div>
        </div>
    </div>
@endsection