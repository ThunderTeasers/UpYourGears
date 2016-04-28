@extends('layouts.dashboard')

@section('content')
    <table>
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
            <td class="center">
                <a class="table__view" href="/dashboard/articles/{{ $article->id }}">Изменить</a> |
                {!! \App\Helpers\Helpers::delete_form(['dashboard.article.delete', $article->id]) !!}
            </td>
        </tr>
    @endforeach
    </table>
@endsection