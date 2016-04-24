<div id="comments">
    <div id="comments__list">
        @if(count($comments) > 0)
            @foreach($comments as $comment)
                <div class="comments_comment clear">
                    <div class="comments_comment_author">
                        {{--@if(Auth::user()->image != null)--}}
                        {{--123--}}
                        {{--@else--}}
                        <img src="{{ URL::asset('storage/app/public/user.jpg') }}" alt="{{ $comment->user()->first()->username }}">
                        {{--@endif--}}
                        <span>{{ $comment->user()->first()->username }}</span>
                    </div>
                    <div class="comments_comment_body">
                        {{ $comment->body }}
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    @if(Auth::check())
        <span id="comments__header">Добавить комментарий</span>
        {!! Form::open(['route' => 'user.add-comment']) !!}
            {!! Form::textarea('body', null, ['placeholder' => 'Текст комментария']) !!}
            {!! Form::hidden('article_id', $article->id) !!}
            {!! Form::submit('Добавить') !!}
        {!! Form::close() !!}
    @endif
</div>