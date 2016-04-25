@extends('layouts.master')

@section('meta_title'){{ $category->meta_title }}@endsection
@section('meta_description'){{ $category->meta_description }}@endsection
@section('meta_keywords'){{ $category->meta_keywords }}@endsection

@section('content')
    <div class="page-header">
        <span class="h1">{{ $category->title }}</span>
    </div>
    <div class="page-description">
        {!! $category->description !!}
    </div>

    @foreach($articles as $article)
        <span class="page-header h2">
            <a href="{{ $category->slug.'/'.$article->slug }}">{{ $article->title }}</a>
            <span class="date">{{ \Jenssegers\Date\Date::parse($article->created_at)->format('j F Y') }}</span>
        </span>
        <div class="page-description">
            {!! $article->description !!}
        </div>
    @endforeach

    {{ $articles->render() }}
@endsection