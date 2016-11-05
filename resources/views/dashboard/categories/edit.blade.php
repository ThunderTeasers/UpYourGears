@extends('layouts.dashboard')

@section('meta_title')
    Изменение категории - {{ $category->title }}
@endsection

@section('content')
    <div class="container">
        <h1>Редактирование категории "{{ $category->title }}"</h1>
        {!! Form::model($category, ['method' => 'PATCH', 'route' => ['dashboard.categories.update', $category->id]]) !!}
            {!! Form::hidden('id', $category->id) !!}
            @include('dashboard.categories.partials.form')
            {!! Form::submit('Сохранить', ['class' => 'btn btn-accept']) !!}
        {!! Form::close() !!}
    </div>
@endsection