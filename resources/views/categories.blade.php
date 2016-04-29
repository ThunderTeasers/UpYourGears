@extends('layouts.master')

@section('meta_title'){{ $category->meta_title }}@endsection
@section('meta_description'){{ $category->meta_description }}@endsection
@section('meta_keywords'){{ $category->meta_keywords }}@endsection

@section('content')
    <div itemscope itemtype="http://schema.org/Article">
        <div class="page-header">
            <span class="h1" itemprop="name">{{ $category->title }}</span>
        </div>
        <div class="page-description" itemprop="description">
            {!! $category->description !!}
        </div>
    </div>

    @foreach($childs as $child)
        <span class="page-header h3">
            <a href="/{{ $category->slug.'/'.$child->slug }}">
                {{ $child->title }}
            </a>
            <span class="category-count">
                {{ $child->articles()->count() }}
            </span>
        </span>
    @endforeach
@endsection