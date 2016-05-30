@extends('layouts.dashboard')

@section('meta_title')
    Список заметок
@endsection

@section('content')
    <table>
        <tr>
            <th>id</th>
            <th>Название</th>
            <th>Действие</th>
        </tr>
    @foreach($drafts as $draft)
        <tr>
            <td class="center">{{ $draft->id }}</td>
            <td class="center">{{ $draft->title }}</td>
            <td class="center">
                <a class="table__view" href="{{ URL::route('dashboard.drafts.edit', $draft->id) }}">Изменить</a> |
                {!! \App\Helpers\Helpers::delete_form(['dashboard.drafts.destroy', $draft->id]) !!}
            </td>
        </tr>
    @endforeach
    </table>
@endsection