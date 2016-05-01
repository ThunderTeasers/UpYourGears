@extends('layouts.dashboard')

@section('meta_title')
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
                <a class="table__view" href="{{ URL::route('dashboard.categories.edit', $category->id) }}">Изменить</a> |
                {!! \App\Helpers\Helpers::delete_form(['dashboard.categories.destroy', $category->id]) !!}
            </td>
        </tr>
    @endforeach
    </table>
@endsection