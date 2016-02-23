@extends('layouts.app')

@section('content')

    <article class="panel">
        <header class="panel-heading">
            {{ $post->title }}
        </header>
        <div class="panel-body">
            {{ $post->cover_image }}
            {!! $post->body !!}
        </div>
    </article>

@stop