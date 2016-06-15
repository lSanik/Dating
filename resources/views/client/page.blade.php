@extends('client.app')

@section('content')
    <div class="container">
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
            <div class="col-md-4">
                @include('client.blocks.users-online')
            </div>
        </div>
    </div>
@stop