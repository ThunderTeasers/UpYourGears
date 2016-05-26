@extends('layouts.master')

@section('meta_title')
    Контакты
@endsection
@section('meta_description')
    Контакты и описание сайта UpYourGears.ru
@endsection
@section('meta_keywords')
    контакты, и, описание, сайта
@endsection

@section('content')
    <div itemscope itemtype="http://schema.org/Blog">
        <meta itemprop="inLanguage" content="ru-RU"/>
        <h1 itemprop="name">Контакты</h1>
        <div itemprop="description">
            <p>Сайт создан для сбора полезной информации в одном месте, чтобы любой человек будь то новичок или более опытный смог найти для себя что-то полезное и интересное.</p>
            <p>Связаться с администратором можно по email: <a href="mailto:admin@upyourgears.ru">admin@upyourgears.ru</a></p>
        </div>
    </div>
@endsection