@extends('layouts.master')

@section('meta_title'){{ $article->meta_title }}@endsection
@section('meta_description'){{ $article->meta_description }}@endsection
@section('meta_keywords'){{ $article->meta_keywords }}@endsection

@section('content')
    <div class="article clearfix" itemscope itemtype="http://schema.org/BlogPosting">
        <meta itemprop="inLanguage" content="ru-RU"/>
        <div class="page-header">
            <h1 itemprop="name">{{ $article->title }}</h1>
            <meta itemprop="headline" content="{{ $article->title }}">
            <span itemscope="publisher">
                <meta itemprop="name" content="UpYourGears">
                <meta itemprop="logo" content="https://upyourgears.ru/public/images/common/logo.jpg">
            </span>
            <span class="article-author" itemprop="author">Ерохин Максим</span>
            <span class="article-date">{{ \Jenssegers\Date\Date::parse($article->created_at)->format('d-M-Y') }}</span>
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