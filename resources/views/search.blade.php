@extends('layouts.master')

@section('content')
    @if(count($articles) > 0)
        @foreach($articles as $article)
            <div class="category_article clear" itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">
                <span class="page-header h2">
                    <a href="{{ $article->category()->first()->parent()->first() ? '/'.$article->category()->first()->parent()->first()->slug : '' }}/{{ $article->category()->first()->slug }}/{{ $article->slug }}">{{ $article->title }}</a>
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