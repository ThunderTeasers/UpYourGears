@extends('layouts.dashboard')

@section('title')
     Изменение статьи - {{ $article->title }}
@endsection

@section('content')
    <div class="container">
        {!! Form::model($article, ['method' => 'PATCH', 'route' => ['dashboard.articles.update', $article->id]]) !!}
            {!! Form::hidden('id', $article->id) !!}
            <div class="form-group">
                {!! Form::label('title', 'Название') !!}
                {!! Form::text('title', null, ['required', 'class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Описание', ['class' => 'control-label']) !!}
                {!! Form::textarea('description', null, ['required', 'class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('body', 'Текст') !!}
                {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('category_id', 'Родительская категория') !!}
                <select name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                @if($category->id == $article->category_id)
                                selected
                                @endif
                        >{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {!! Form::label('created_at', 'Дата создания') !!}
                {!! Form::date('created_at', null, ['required', 'class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', null, ['required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('tags', 'Tags') !!}
                {!! Form::select('tags[]', $tags, null, ['multiple']) !!}
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
            {!! Form::submit('Сохранить') !!}
        {!! Form::close() !!}
    </div>
@endsection