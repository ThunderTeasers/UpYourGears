<div class="form-group">
    {!! Form::label('title', 'Название') !!}
    {!! Form::text('title', null, ['required']) !!}
</div>
<div class="form-group">
    {!! Form::label('text', 'Текст') !!}
    {!! Form::textarea('text', null, ['required']) !!}
</div>