@extends('layouts.dashboard')

@section('meta_title')
    Список категорий
@endsection

@section('content')
    <table>
        <tr>
            <th>id</th>
            <th>Имя пользователя</th>
            <th>Действие</th>
        </tr>
    @foreach($users as $user)
        <tr>
            <td class="center">{{ $user->id }}</td>
            <td class="center">{{ $user->username }}</td>
            <td class="center">
                <a class="table__view" href="{{ URL::route('dashboard.users.edit', $user->id) }}">Изменить</a> |
                {!! \App\Helpers\Helpers::delete_form(['dashboard.users.destroy', $user->id]) !!}
            </td>
        </tr>
    @endforeach
    </table>
@endsection