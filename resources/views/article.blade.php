@extends('layouts.master')

@section('meta_title'){{ $article->meta_title }}@endsection
@section('meta_description'){{ $article->meta_description }}@endsection
@section('meta_keywords'){{ $article->meta_keywords }}@endsection

@section('content')
    <div class="page-header">
        <span class="h1">{{ $article->title }}</span>
        <span class="date">{{ date('F d, Y', strtotime($article->created_at)) }}</span>
    </div>
    <div class="page-description">
        {!! $article->description !!}
        {!! $article->body !!}
    </div>

    @include('includes.comments')
@endsection