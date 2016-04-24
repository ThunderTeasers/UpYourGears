@extends('layouts.master')

@section('content')
    @if(count($articles) > 0)
        @foreach($articles as $article)
            <div class="clear">
			<span class="h3">
				<a href="/articles/{{ $article->category()->first()->slug }}/{{ $article->slug }}">{{ $article->title }}</a>
			</span>
                <div class="page-description">
                    {!! $article->description !!}
                </div>
            </div>
        @endforeach
    @else
        <span>Ничего не найдено.</span>
    @endif
@endsection