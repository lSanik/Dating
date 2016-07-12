@extends('client.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="col-md-8">
                @foreach($post as $p)
                    <h1>{{ $p->title }}</h1>
                    @if( $p->cover_image )
                        <img src="{{ url('/uploads/pages/images/'.$p->cover_image) }}" width="100%">
                    @endif
                    {!! $p->body !!}
                @endforeach
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
@stop
