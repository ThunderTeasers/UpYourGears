@extends('layouts.dashboard')

@section('meta_title')
    Изменение категории - {{ $category->title }}
@endsection

@section('content')
    <div class="container">
        {!! Form::model($category, ['method' => 'PATCH', 'route' => ['dashboard.categories.update', $category->id]]) !!}
            {!! Form::hidden('id', $category->id) !!}
            @include('dashboard.categories.partials.form')
            {!! Form::submit('Сохранить') !!}
        {!! Form::close() !!}
    </div>
@endsection