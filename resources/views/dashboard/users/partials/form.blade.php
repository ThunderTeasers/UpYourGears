<div class="form-group">
    {!! Form::label('username', 'Название') !!}
    {!! Form::text('username', null, ['required']) !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'E-mail') !!}
    {!! Form::text('email', null, ['required']) !!}
</div>
<div class="form-group">
    {!! Form::label('is_admin', 'Администратор') !!}
    {!! Form::checkbox('is_admin') !!}
</div>
<div class="form-group">
    {!! Form::label('image', 'Изображение') !!}
    @if(isset($user->image))
        <img src="{{ URL::asset('/public/uploads/'.$user->image) }}">
    @else
        <span>Еще не загружено</span>
    @endif
    {!! Form::file('image') !!}
</div>