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
        @foreach($parent_categories as $parent_category)
            <option value="{{ $parent_category->id }}">{{ $parent_category->title }}</option>
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