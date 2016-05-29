@extends('client.app')

@section('content')
    <div class="container-fluid content-bg">
        <div class="row map-bg">
            <div class="container">
                <div class="col-md-12 price_table">
                    <header class="text-center">
                        <h2>{{ trans('payments.payments') }}</h2>
                    </header>
                    <div class="col-md-10 col-md-offset-2">
                        @foreach($prices as $p)
                            @if( $p->name !== 'ex_rate')
                                @include('client.blocks.payment')
                            @endif
                        @endforeach
                    </div>
                    <div class="text-center">
                        <h2 class="text-center"> {{ trans('payments.add') }}</h2>
                        <a href="{{ url('/'.App::getLocale().'/payments/checkout') }}" class="btn btn-pink">
                            {{ trans('payments.addCost') }}
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </div>
@stop

@section('styles')
    <style>
        .price_table{

            margin-bottom: 50px;
        }
        .pricing{
            border: 1px solid #ccc;
            background: white;
            margin: 10px;
            padding: 10px;
        }
        .type{
            font-weight: bold;
        }
    </style>
@stop

@section('scripts')

@stop