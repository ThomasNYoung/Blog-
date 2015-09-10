@extends('layouts.master')

@section('content')
<!-- 
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha256-Sk3nkD6mLTMOF0EOpNtsIry+s1CsaqQC1rVLTAy+0yc= sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
     -->

<div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Blog
                        <strong>Posts</strong>
                    </h2>
                    <hr>
                    <!-- <img class="img-responsive img-border img-right" src="img/DeathtoStock_Wired2.jpg" alt=""> -->
                    <hr class="visible-xs">
                    @foreach($posts as $post)
                        <h2><a href="{{ action('PostsController@show', $post->id) }}">{{ $post->title }}</a></h2>
                        <p><em> By {{$post->user->first_name}} {{$post->user->last_name}} </em></p>
                        
                    @endforeach

                    {{ $posts->links() }}   
            </div>
        </div>
   

    

@stop
