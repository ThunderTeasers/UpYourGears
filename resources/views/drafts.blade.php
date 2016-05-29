@extends('layouts.master')

@section('meta_title')
    Короткие заметки\полезные сниппеты
@endsection
@section('meta_description')
    Сборище полезный кусков кода и заметок собранных вместе
@endsection
@section('meta_keywords')
    полезные, куски, кода, сниппеты, заметки
@endsection

@section('content')
    <div itemscope itemtype="http://schema.org/Blog">
        <meta itemprop="inLanguage" content="ru-RU"/>
        <div class="page-header">
            <h1 itemprop="name">Заметки</h1>
        </div>
        <div class="page-description" itemprop="description">
            <p>Собрание полезных для работы сниппетов кода и коротких заметок.</p>
        </div>

        @foreach($drafts as $draft)
            <div class="category_article clear" itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">
                <span class="page-header h2">
                    <a itemprop="name">{{ $draft->title }}</a>
                    <meta itemprop="datePublished" content="{{ \Jenssegers\Date\Date::parse($draft->created_at)->format('Y-m-d') }}"/>
                </span>
                <div class="page-description" itemprop="description">
                    {!! $draft->text !!}
                </div>
            </div>
        @endforeach
        {{ $drafts->render() }}
    </div>
    <br>
@endsection