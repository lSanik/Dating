@extends('layouts.app')

@section('content')


<article class="panel">
   <header class="panel-heading">
      {{ $post[0]->title }}
   </header>
   <div class="panel-body">

      <img src="{{  url('/uploads/blog/'.$image->cover_image) }}" alt="{{ $post[0]->title }}">
      {!! $post[0]->body !!}
   </div>
</article>


@stop