@extends('layouts.dashboard')

@section('title')
    Изменение категории - {{ $category->title }}
@endsection

@section('content')
    <div class="container">
        {!! Form::open(['route' => 'dashboard.categories.update']) !!}
            {!! Form::hidden('id', $category->id) !!}
            <div class="form-group">
                {!! Form::label('title', 'Название') !!}
                {!! Form::text('title', $category->title, ['required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Описание') !!}
                {!! Form::textarea('description', $category->description, ['required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('parent_id', 'Родительская категория') !!}
                <select name="parent_id" id="parent_id">
                    <option value="0"
                        @if(!isset($category->parent_id) || $category->parent_id == 0)
                            selected
                        @endif
                    >Корневая</option>
                    @foreach($categories as $parent_category)
                        <option value="{{ $parent_category->id }}"
                            @if($parent_category->id == $category->parent_id)
                                selected
                            @endif
                        >{{ $parent_category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', $category->slug, ['required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('meta_title', 'Мета тайтл') !!}
                {!! Form::text('meta_title', $category->meta_title) !!}
            </div>
            <div class="form-group">
                {!! Form::label('meta_description', 'Мета описание') !!}
                {!! Form::text('meta_description', $category->meta_description) !!}
            </div>
            <div class="form-group">
                {!! Form::label('meta_keywords', 'Мета ключевые слова') !!}
                {!! Form::text('meta_keywords', $category->meta_keywords) !!}
            </div>
            {!! Form::submit('Сохранить') !!}
        {!! Form::close() !!}
    </div>
@endsection