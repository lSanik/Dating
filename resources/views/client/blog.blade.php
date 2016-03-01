@extends('layouts.app')

@section('content')

    <article class="panel">
        <header class="panel-heading">
            {{ $post->title }}
        </header>
        <div class="panel-body">

           <img src="{{  url('/uploads/blog/'.$post->cover_image) }}" alt="{{ $post->title }}">
            {!! $post->body !!}
        </div>
    </article>

@stop