@extends('layouts.dashboard')

@section('meta_title')
    Список статей
@endsection

@section('content')
    <div class="block-search">
        <div class="buttons">
            <a href="{{ URL::route('dashboard.articles.create') }}" class="btn btn-accept">Создать</a>
        </div>
    </div>

    <table class="articles">
        <tr>
            <th>id</th>
            <th>Название</th>
            <th>Категория</th>
            <th>Действие</th>
        </tr>
    @foreach($articles as $article)
        <tr>
            <td class="center">{{ $article->id }}</td>
            <td>{{ $article->title }}</td>
            <td class="center">{{ $article->category()->first()['title'] }}</td>
            <td class="center action">
                <a class="show" href="{{ URL::route('dashboard.articles.edit', $article->id) }}">Изменить</a>
                {!! \App\Helpers\Helpers::delete_form(['dashboard.articles.destroy', $article->id]) !!}
            </td>
        </tr>
    @endforeach
    </table>
@endsection