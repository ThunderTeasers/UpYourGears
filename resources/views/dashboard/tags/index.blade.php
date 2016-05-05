@extends('layouts.dashboard')

@section('meta_title')
    Список категорий
@endsection

@section('content')
    <table>
        <tr>
            <th>id</th>
            <th>Название</th>
            <th>Slug</th>
            <th>Действие</th>
        </tr>
    @foreach($tags as $tag)
        <tr>
            <td class="center">{{ $tag->id }}</td>
            <td class="center">{{ $tag->title }}</td>
            <td class="center">{{ $tag->slug }}</td>
            <td class="center">
                <a class="table__view" href="{{ URL::route('dashboard.tags.edit', $tag->id) }}">Изменить</a> |
                {!! \App\Helpers\Helpers::delete_form(['dashboard.tags.destroy', $tag->id]) !!}
            </td>
        </tr>
    @endforeach
    </table>
@endsection