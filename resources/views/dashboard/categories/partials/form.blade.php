<div class="form-group">
    {!! Form::label('title', 'Название') !!}
    {!! Form::text('title', null, ['required', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Описание') !!}
    {!! Form::textarea('description', null, ['required', 'novalidate']) !!}
</div>
<div class="form-group">
    {!! Form::label('parent_id', 'Родительская категория') !!}
    {!! Form::select('parent_id', $parent_categories, null) !!}
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['required', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('meta_title', 'Мета тайтл') !!}
    {!! Form::text('meta_title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('meta_description', 'Мета описание') !!}
    {!! Form::text('meta_description', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('meta_keywords', 'Мета ключевые слова') !!}
    {!! Form::text('meta_keywords', null, ['class' => 'form-control']) !!}
</div>