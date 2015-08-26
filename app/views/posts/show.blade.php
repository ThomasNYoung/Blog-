@extends('layouts.master')

@section('content')

    <h2>{{{ $post->title }}}</h2>

    <p><em> By {{{ $post->user->first_name }}} {{{ $post->user->last_name }}}</em></p>

    <p>{{{ $post->body }}}</p>

    @if(Session::has('test'))
        {{ Session::get('test') }}
    @endif

    <div class="row">
        <div class="col-md-6">
            @if(Auth::check())
                @if(Auth::id() == $post->user_id)

                    <a class="btn btn-primary" href="{{ action('PostsController@edit', $post->id) }}">Edit</a>
                    <button id="delete" class="btn btn-danger">Delete</button>
                @endif
            @endif
        </div>
    </div>

    {{ Form::open(array('action' => array('PostsController@destroy', $post->id), 'method' => 'DELETE', 'id' => 'formDelete')) }}
    {{ Form::close() }}

@stop

@section('script')
    <script>
        (function(){
            "use strict";
            $('#delete').on('click', function(){
                var onConfirm = confirm('Do you really want to delete that??');
                if(onConfirm) {
                    $('#formDelete').submit();
                }
            });
        })();
    </script>
@stop