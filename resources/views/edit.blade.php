@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @php echo $errors->first() @endphp
            {!! \Form::model($post, ['method' => 'PATCH', 'action' => ['PostController@update',$post->id]]) !!}
            <div class="form-group">
                {!! \Form::text('title', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! \Form::textarea('body', null, ['id' => 'content', 'class' => 'form-control', 'data-provide' => 'markdown', 'rows' => '10']) !!}
            </div>

            <div class="form-group">
                {!! \Form::label('active', 'Active Status') !!}
                {!! \Form::checkbox('active', $post->active, $post->active) !!}
            </div>

            {!! \Form::submit('Save', ['class' => 'btn btn-success', 'id' => 'btnSave']) !!}
        </div>
    </div>
</div>

<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/marked.js') }}"></script>
<script src="{{ asset('js/bootstrap-markdown.js') }}"></script>
<script src="{{ asset('js/functions.js') }}"></script>
<script>
    var content = document.getElementById('content');
    content.innerHTML = marked(content.value);
</script>
@endsection