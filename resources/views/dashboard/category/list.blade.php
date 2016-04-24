@extends('layouts.dashboard')

@section('title')
    Список категорий
@endsection

@section('content')
    <table>
        <tr>
            <th>id</th>
            <th>Название</th>
            <th>Родительская категория</th>
            <th>Действие</th>
        </tr>
    @foreach($categories as $category)
        <tr>
            <td class="center">{{ $category->id }}</td>
            <td>{{ $category->title }}</td>
            <td class="center">
                @if(isset($category->parent_id) && $category->parent_id > 0)
                    {{ $category->where(['id' => $category->parent_id])->first()->title }}
                @else
                    -
                @endif
            </td>
            <td class="center">
                <a class="table__view" href="/dashboard/categories/{{ $category->id }}">Изменить</a> |
                {!! delete_form(['dashboard.categories.delete', $category->id]) !!}
            </td>
        </tr>
    @endforeach
    </table>
@endsection