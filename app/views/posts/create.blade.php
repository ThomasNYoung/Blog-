
@extends('layouts.master')

@section('content')

    <h1>Create Post</h1>

    {{ Form::open(array('action' => array('PostsController@store'), 'files'=>true)) }}
        @include('posts.create-edit-form')
    {{ Form::close() }}

@stop