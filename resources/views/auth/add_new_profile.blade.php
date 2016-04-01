@extends('layouts.app')

@section('styles')
    <link href="{{ url('assets/css/datepicker.css') }}" rel="stylesheet">
@stop

@section('content')

    <div class="container">


        <div class="col-md-10 col-md-offset-1">

            <section class="panel panel-default">
                <header class="panel-heading">
                    {{ trans('register.new_user') }} | Основная информация
                </header>
                <div class="panel-body">
                    @if( !empty( $user_data) )
                        <?php
                            $name = explode(' ', $user_data->name);

                            if( !empty($name[0]) )
                                $givenName = $name[0];
                            else
                                $givenName = $user_data->name;

                            if( !empty($name[1]) )
                                $familyName = $name[1];
                            else
                                $familyName = $user_data->name;

                        ?>
                        {!! Form::open(['url' => '#']) !!}
                            <div class="form-group">
                                <img src="{{ $user_data->avatar }}" />
                                {!! Form::hidden('avatar', $user_data->avatar) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('first_name', trans('common.first_name')) !!}
                                {!! Form::text('first_name', $givenName, ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('second_name', trans('common.second_name')) !!}
                                {!! Form::text('second_name', $familyName, ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('birthday', trans('common.birthday')) !!}
                                {!! Form::text('birthday', null, ['class' => 'form-control date-picker', 'required' => 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('email', trans('common.email')) !!}
                                {!! Form::email('email', $user_data->email, ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('phone', trans('common.phone')) !!}
                                {!! Form::tel('phone', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('country', trans('common.country')) !!}

                                <select name="county" class="form-control">
                                        <option value="0"> {{trans('register.select-country')}} </option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}"> {{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                {!! Form::label('state', trans('common.state')) !!}
                                <select name="state" class="form-control"></select>
                            </div>
                            <div class="form-group">
                                {!! Form::label('city', trans('common.city')) !!}
                                <select name="city" class="form-control"></select>
                            </div>

                            <div class="form-group">
                                {!! Form::label('password', trans('register.password') ) !!}
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('repass', trans('register.repass')) !!}
                                {!! Form::password('repass',  ['class' => 'form-control',  'required' => 'required']) !!}
                            </div>

                            <div class="form-group text-center">
                                @if( $user_data->user['gender'])
                                    {!! Form::hidden('gender', $user_data->user['gender']) !!}
                                @endif
                                {!! Form::submit(trans('common.submit'), ['class' => 'btn btn-success', 'required' => 'required']) !!}
                            </div>
                        {!! Form::close() !!}
                    @endif
                </div>
            </section>

        </div>


    </div>

@stop

@section('scripts')
        <!--bootstrap picker-->
    <script type="text/javascript" src="{{ url('/assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}"></script>

    <script>
        $(function(){
            $('.date-picker').datepicker();


            $('select[name="county"]').on('change', function(){

                $('select[name="city"]').empty();

                $.ajax({
                    type: 'POST',
                    url: '{{ url('/get/states/')  }}',
                    data: {id: $(this).val(), _token: $('input[name="_token"]').val()  },
                    success: function( response ){
                        $('select[name="state"]').empty();
                        for( var i = 0; i < response.length; i++ )
                        {
                            $('select[name="state"]').append("<option value='" + response[i].id + "'>" + response[i].name + "</option>");
                        }
                    },
                    error: function( response ){
                        console.log( response )
                    }
                });

            });

            $('select[name="state"]').on('change', function(){

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
                });

            });
        });
    </script>
@stop