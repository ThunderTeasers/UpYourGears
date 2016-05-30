@extends('layouts.dashboard')

@section('meta_title')
    Изменение заметки - {{ $draft->title }}
@endsection

@section('content')
    <div class="container">
        {!! Form::model($draft, ['method' => 'PATCH', 'route' => ['dashboard.drafts.update', $draft->id]]) !!}
            {!! Form::hidden('id', $draft->id) !!}
            @include('dashboard.drafts.partials.form')
            {!! Form::submit('Сохранить') !!}
        {!! Form::close() !!}
    </div>
@endsection