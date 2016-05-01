<div class="form-group">
    {!! Form::label('title', 'Название') !!}
    {!! Form::text('title', null, ['required', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Описание') !!}
    {!! Form::textarea('description', null, ['required', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('body', 'Текст') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('category_id', 'Родительская категория') !!}
    {!! Form::select('category_id', $categories, null) !!}
</div>
<div class="form-group">
    {!! Form::label('created_at', 'Дата создания') !!}
    {!! Form::date('created_at', $article->created_at, ['required', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['required']) !!}
</div>
<div class="form-group">
    {!! Form::label('tag_list', 'Tags') !!}
    {!! Form::select('tag_list[]', $tags, null, ['multiple']) !!}
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