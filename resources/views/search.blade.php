@extends('layouts.master')

@section('meta_title')
    Поиск
@endsection

@section('content')
    @if(count($articles) > 0)
        @foreach($articles as $article)
            <div class="category_article clear" itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">
                <span class="page-header h2">
                    <a href="{{ $article->category()->first()->parent() ? '/'.$article->category()->first()->parent()->slug : '' }}/{{ $article->category()->first()->slug }}/{{ $article->slug }}">{{ $article->title }}</a>
                </span>
                <div class="page-description" itemprop="description">
                    {!! $article->description !!}
                </div>
            </div>
        @endforeach
        {{ $articles->render() }}
    @else
        <span>Ничего не найдено.</span>
    @endif
@endsection