@extends('layouts.dashboard')

@section('meta_title')
    Создание заметки
@endsection

@section('content')
    <div class="container">
        {!! Form::open(['method' => 'POST', 'route' => 'dashboard.drafts.store']) !!}
            @include('dashboard.drafts.partials.form')
            {!! Form::submit('Создать', ['class' => 'button']) !!}
        {!! Form::close() !!}
    </div>
@endsection