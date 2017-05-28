@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">               
                <div class="panel-heading">{{ $post->title }} by {{ $post->name }}</div>
                <div class="panel-body">
                    <i>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->published_at, 'Australia/Brisbane')->toDayDateTimeString() }}</i>
                    <br />
                    <br />
                    {{-- The e function runs htmlentities over the given string: --}}
                    {{-- nl2br — Inserts HTML line breaks before all newlines in a string --}}
                    {!! html_entity_decode($post->body) !!}
                </div>
                @if (Auth::check())
                    <div class="btn-group form-buttons" role="group" aria-label="...">
                        <a href="{{ URL::to('posts/' . $post->id) . '/edit' }}" class="btn btn-primary" role="button">Edit</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletePostModal">Delete</button>
                        <div class="modal fade" id="deletePostModal" tabindex="-1" role="dialog" aria-labelledby="deletePostModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="deletePostModalLabel">Delete</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this post?</p>
                                </div>
                                <div class="modal-footer">
                                    {{ Form::open(array('url' => 'posts/' . $post->id)) }}
                                    {{ Form::hidden('_method', 'DELETE') }}
                                    {{ Form::button('Close', array('class' => 'btn btn-default', 'data-dismiss' => 'modal')) }}
                                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}                                    
                                </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection