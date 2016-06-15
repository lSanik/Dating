@extends('client.app')

@section('content')
    @include('client.blocks.searchSlider')
    <div class="container-fluid content-bg">
        <div class="row map-bg">
            <div class="container">
                <div class="row">

                    <header class="text-center">
                        @if(!Auth::user() || Auth::user()->hasRole('male'))
                            <h2>{{ trans('search.girls') }}</h2>
                        @else
                            <h2>{{ trans('search.mans') }}</h2>
                        @endif
                    </header>

                    <div class="col-md-12">
                        <div class="users col-md-offset-1">
                            @foreach($users as $u)
                                @include('client.blocks.user-item')
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="row text-center" id="pagination">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@stop

@section('styles')
    <style>
        .item {
            width: 226px;
            margin-right: 10px;
            float: left;
            border: 1px solid #ccc;
            margin-top: 10px;
        }

        .item img {
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
