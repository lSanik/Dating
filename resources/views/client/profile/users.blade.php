@extends('client.profile.profile')

@section('profileContent')
    <div class="row">
        <header class="text-center">
            <h2>{{ trans('profile.online') }}</h2>
        </header>
        @foreach($users as $u)
            @if($u->isOnline())
                @include('client.blocks.user-item')
            @endif
        @endforeach
    </div>
    <div class="row text-center bottom-50">
        {{ $users->links() }}
    </div>
@stop


@section('styles')
    <style>
        .item{
            width: 226px;
            margin-right: 10px;
            float: left;
            border: 1px solid #ccc;
            margin-top: 10px;
        }
        .item img{
            display: block;
            width: 75%;
            margin: 0 auto;
            padding-top: 20px;
            -webkit-transform-style: preserve-3d;
        }

        .item .photo img {
            width: 190px;
            height: 200px;
        }
    </style>
@stop


@section('scripts')

@stop