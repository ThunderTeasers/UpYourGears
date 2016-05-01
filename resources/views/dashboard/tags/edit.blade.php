@extends('layouts.dashboard')

@section('meta_title')
    Изменение тега - {{ $tag->title }}
@endsection

@section('content')
    <div class="container">
        {!! Form::model($tag, ['method' => 'PATCH', 'route' => ['dashboard.tags.update', $tag->id]]) !!}
            {!! Form::hidden('id', $tag->id) !!}
            @include('dashboard.tags.partials.form')
            {!! Form::submit('Сохранить') !!}
        {!! Form::close() !!}
    </div>
@endsection