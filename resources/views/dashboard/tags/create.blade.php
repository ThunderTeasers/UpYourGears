@extends('layouts.dashboard')

@section('meta_title')
    Создание тега
@endsection

@section('content')
    <div class="container">
        {!! Form::open(['method' => 'POST', 'route' => 'dashboard.tags.store']) !!}
            @include('dashboard.tags.partials.form')
            {!! Form::submit('Создать', ['class' => 'button']) !!}
        {!! Form::close() !!}
    </div>
@endsection