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
                            <div class="main_items">
                                @if($_POST && $search_attrs['is_online']==1)
                                    @foreach($users as $u)
                                        @if($u->isOnline())
                                            @include('client.blocks.user-item')
                                        @endif
                                    @endforeach
                                @else
                                    @foreach($users as $u)
                                        @include('client.blocks.user-item')
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row text-center" id="pagination">
                 @if($users->links())
                    {{ $users->links() }}
                @endif
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
@section('scripts')
<script type="text/javascript" src="{{ url('/assets/js/bootstrap-fileinput-master/js/fileinput.js') }}"></script>
<script type="text/javascript" src="{{ url('/assets/js/file-input-init.js') }}"></script>
<script>
    function get_cities( $id )
    {
        $.ajax({
            type: 'POST',
            url: '{{ url('/get/cities/') }}',
            data: {id: $id, _token: $('input[name="_token').val() },
            success: function( response ){
                $('select[name="city"]').empty();
                for ( var i = 0; i < response.length; i++)
                {
                    if( response[i].id == $('input[name="user_city_id"]').val() )
                        $('select[name="city"]').append("<option value='" + response[i].id + "'  selected='selected'>" + response[i].name + "</option>");
                    else
                        $('select[name="city"]').append("<option value='" + response[i].id + "'>" + response[i].name + "</option>");
                }

            },
            error: function( response ){
                console.log( response );
            }
        });
    }

    function get_states( $id )
    {
        $.ajax({
            type: 'POST',
            url: '{{ url('/get/states/') }}',
            data: {id: $id, _token: $('input[name="_token"]').val()  },
            success: function( response ){
                $('select[name="user_state_id"]').empty();

                for( var i = 0; i < response.length; i++ )
                {
                    if( response[i].id == $('input[name="user_state_id"]').val() )
                        $('select[name="user_state_id"]').append("<option value='" + response[i].id + "' selected='selected'>" + response[i].name + "</option>");
                    else
                        $('select[name="user_state_id"]').append("<option value='" + response[i].id + "'>" + response[i].name + "</option>");
                }
            },
            error: function( response ){
                console.log( response )
            }
        });

        get_cities($id);
    }

    jQuery(window).on('load', function(){

        get_states( $('select[name="county"]').val() );

    });
    $('select[name="county"]').on('change', function(){

        $('select[name="city"]').empty();

        $.ajax({
            type: 'POST',
            url: '{{ url('/get/states/')  }}',
            data: {id: $(this).val(), _token: $('input[name="_token"]').val()  },
            success: function( response ){
                $('select[name="user_state_id"]').empty();
                for( var i = 0; i < response.length; i++ )
                {
                    $('select[name="user_state_id"]').append("<option value='" + response[i].id + "'>" + response[i].name + "</option>");
                }
            },
            error: function( response ){
                console.log( response )
            }
        });

    });

    $('select[name="user_state_id"]').on('change', function(){

        $.ajax({
            type: 'POST',
            url: '{{ url('/get/cities/') }}',
            data: {id: $(this).val(), _token: $('input[name="_token').val() },
            success: function( response ){
                $('select[name="city"]').empty();
                for ( var i = 0; i < response.length; i++)
                {
                    $('select[name="city"]').append("<option value='" + response[i].id + "'>" + response[i].name + "</option>");
                }

            },
            error: function( response ){
                console.log( response );
            }
        })
    });

</script>
@stop