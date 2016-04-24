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

    @foreach($childs as $child)
        <span class="page-header h3">
            <a href="/{{ $category->slug.'/'.$child->slug }}">
                {{ $child->title }}
            </a>
        </span>
    @endforeach
@endsection