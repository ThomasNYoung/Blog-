@extends('layouts.master')

@section('content')

<h2>hello, {{ $name }} </h2>
<a href="{{{ action('HomeController@showWelcome') }}}">Home</a>

@stop



