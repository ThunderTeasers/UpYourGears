@extends('layouts.master')

@section('meta_title')
    Тег - {{ $tag->title }}
@endsection

@section('content')
    @foreach($articles as $article)
        <div class="category_article clear" itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">
            <span class="page-header h2">
                <a href="/{{ \App\Models\Category::where('id', $article->category()->first()->parent_id)->select(['id', 'slug'])->first()->slug.'/'.$article->category()->first()->slug.'/'.$article->slug }}" itemprop="name">{{ $article->title }}</a>
                <meta itemprop="datePublished" content="{{ \Jenssegers\Date\Date::parse($article->created_at)->format('Y-m-d') }}"/>
                <span class="date">{{ \Jenssegers\Date\Date::parse($article->created_at)->format('j F Y') }}</span>
            </span>
            <div class="page-description" itemprop="description">
                {!! $article->description !!}
            </div>
        </div>
    @endforeach

    {{ $articles->render() }}
    <br>
@endsection