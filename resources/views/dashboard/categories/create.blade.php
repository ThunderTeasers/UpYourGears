@extends('layouts.dashboard')

@section('meta_title')
    Создание категории
@endsection

@section('content')
    <div class="container">
        {!! Form::open(['method' => 'POST', 'route' => 'dashboard.categories.store']) !!}
            @include('dashboard.categories.partials.form')
            {!! Form::submit('Создать', ['class' => 'button']) !!}
        {!! Form::close() !!}
    </div>
@endsection