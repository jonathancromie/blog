@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                @if (Auth::check())
                    <a href="{{ URL::to('posts/create') }}" class="btn btn-primary form-buttons" role="button">Create New Post</a>
                @endif
                @forelse ($posts as $post)
                    @unless (Auth::check())
                        @if ($post->active == 0)
                            @continue
                        @endif
                    @endunless
                    <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ URL::to('/posts/' . $post->id) }}"> {{ $post->title }} by {{ $post->name }}</a>
                    </div>
                    <div class="panel-body">
                        <i>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->published_at, 'Australia/Brisbane')->toDayDateTimeString() }}</i>
                        <br /><br />
                        {{-- The e function runs htmlentities over the given string: --}}
                        {{-- nl2br — Inserts HTML line breaks before all newlines in a string --}}
                        {{-- nl2br(e($post->body)) --}}

                        @if (strpos(nl2br($post->body), '<br />'))
                            {!! html_entity_decode(substr(nl2br($post->body), 0, strpos(nl2br($post->body), '<br />'))) !!}
                            <p>...</p>
                        @else
                            {!! html_entity_decode($post->body) !!}
                        @endif

                    </div>
                    </div>
                @empty
                    <p>No posts are available</p>
                @endforelse
        </div>
    </div>
</div>
@endsection
