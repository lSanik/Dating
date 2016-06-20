@extends('client.app')

@section('content')
    <section>
        {{ dump($post) }}
        @foreach($post as $p)
            <img src="{{ url('/uploads/blog/'.$p->cover_image) }}">
            <h1>{{ $p->title }}</h1>
            <article>
                {!! $p->body !!}
            </article>
        @endforeach
    </section>
@stop