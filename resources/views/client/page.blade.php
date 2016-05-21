@extends('client.app')

@section('content')
    <div class="col-md-12">
        <div class="col-md-8">
            @foreach($page as $p)
                <h1>{{ $p->title }}</h1>
                @if( $p->image )
                    <img src="{{ url('/uploads/pages/images/'.$p->image) }}" width="100%">
                @endif
                {!! $p->body !!}
            @endforeach
        </div>
    </div>
@stop