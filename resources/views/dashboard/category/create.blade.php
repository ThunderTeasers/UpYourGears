@extends('layouts.dashboard')

@section('title')
    Создание категории
@endsection

@section('content')
    <div class="container">
        {!! Form::open(['route' => 'dashboard.categories.create']) !!}
            <div class="form-group">
                {!! Form::label('title', 'Название') !!}
                {!! Form::text('title', null, ['required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Описание') !!}
                {!! Form::textarea('description', null, ['required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('parent_id', 'Родительская категория') !!}
                <select name="parent_id" id="parent_id">
                    <option value="0">Корневая</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', null, ['required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('meta_title', 'Мета тайтл') !!}
                {!! Form::text('meta_title', null) !!}
            </div>
            <div class="form-group">
                {!! Form::label('meta_description', 'Мета описание') !!}
                {!! Form::text('meta_description', null) !!}
            </div>
            <div class="form-group">
                {!! Form::label('meta_keywords', 'Мета ключевые слова') !!}
                {!! Form::text('meta_keywords', null) !!}
            </div>
            {!! Form::submit('Создать', ['class' => 'button']) !!}
        {!! Form::close() !!}
    </div>
@endsection