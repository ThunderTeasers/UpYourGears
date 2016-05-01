@extends('layouts.master')

@section('meta_title'){{ $article->meta_title }}@endsection
@section('meta_description'){{ $article->meta_description }}@endsection
@section('meta_keywords'){{ $article->meta_keywords }}@endsection

@section('content')
    <div class="clear" itemscope itemtype="http://schema.org/BlogPosting">
        <meta itemprop="inLanguage" content="ru-RU"/>
        <div class="page-header">
            <span class="h1" itemprop="headline">{{ $article->title }}</span>
            @unless($article->tags->isEmpty())
                <ul>
                    @foreach($article->tags as $tag)
                        <li>{{ $tag->title }}</li>
                    @endforeach
                </ul>
            @endunless
            <span class="date">
                <meta itemprop="datePublished" content="{{ \Jenssegers\Date\Date::parse($article->created_at)->format('Y-m-d') }}"/>
                {{ \Jenssegers\Date\Date::parse($article->created_at)->format('j F Y') }}
            </span>
        </div>
        <div class="page-description">
            <div itemprop="description">
                {!! $article->description !!}
            </div>
            <div itemprop="articleBody">
                {!! $article->body !!}
            </div>
        </div>
    </div>
@endsection