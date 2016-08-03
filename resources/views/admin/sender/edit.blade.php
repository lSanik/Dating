@extends('admin.layout')
@section('styles')
    <link href="{{ url('/assets/css/bootstrap-reset.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/css/fileinput.css') }}" rel="stylesheet">
    <style>
        .fileinput-upload-button{
            display: none;
        }
        .note-editor, .note-editable{
            min-height: 300px;
        }
    </style>
@stop
@section('content')
    <section class="panel">
        <header class="panel-heading">{{ trans('sender.create') }}</header>
        <div class="panel-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!! Form::open(['url' => '/admin/sender/update', 'class' => 'form', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="col-md-12">
                {{ Form::hidden('girl_id', $message[0]['girl_id']) }}
                {{ Form::hidden('id', $message[0]['id']) }}
                {{ Form::hidden('partner_id', $message[0]['partner_id']) }}
                @if(Auth::user()->hasRole('Owner'))
                    <div class="form-group col-md-12">
                        <label for="title">{{ trans('sender.status') }}</label>
                        <select name="status">
                                <option value="0" @if($message[0]['status']==0){{'selected="selected"'}}@endif>{{trans('sender.status_cheking')}}</option>
                                <option value="1" @if($message[0]['status']==1){{'selected="selected"'}}@endif>{{trans('sender.status_true')}}</option>
                                <option value="2" @if($message[0]['status']==2){{'selected="selected"'}}@endif>{{trans('sender.status_false')}}</option>
                                <option value="3" @if($message[0]['status']==3){{'selected="selected"'}}@endif>{{trans('sender.status_sended')}}</option>
                        </select>
                    </div>
                @endif
                <div class="form-group col-md-12">
                    <label for="title">{{ trans('sender.title') }}</label>
                    {!! Form::input('text', 'title', $message[0]['title'], ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-12">
                    <lable for="body" style="width: 100%;float: left;">{{ trans('sender.body') }}</lable>
                    {!! Form::textarea('textarea',  $message[0]['body'],null, ['class'=>'form-control']) !!}
                </div>
                <div class="man-list col-md-12">
                    <div class="title panel-heading">
                        {{ trans('sender.man-list') }}
                    </div>
                    <div id="list">

                    </div>
                </div>
                <div class="form-group text-right">
                    {{ Form::submit(trans('sender.submit-man'), ['class' => 'btn btn-success']) }}
                </div>
            </div>
            {!! Form::close() !!}
            {!! Form::open(['url' => '/#','class' => 'form', 'method' => 'POST','id'=>'ajax_man', 'enctype' => 'multipart/form-data']) !!}
            <div class="col-md-12">
                <div class="title panel-heading">
                    {{ trans('sender.man-filter') }}
                </div>
                <div class="col-md-12 man-filter">
                    <div class="form-group col-md-6">
                        {!! Form::label('coutry', trans('profile.country')) !!}
                        <select name="county" class="form-control">
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}"

                                > {{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('user_state_id', trans('profile.state') ) !!}

                        <select name="user_state_id" class="form-control"></select>
                    </div>
                    <div class="form-group col-md-2">
                        {!! Form::label('age', trans('sender.age'), ['style'=>'float:left;width:100%;'] ) !!}
                        {!! Form::number('age_from', 18, ['min' => 18, 'max' => 100, 'class' => 'form-control col-md-6', 'style' => 'width: 45%;float: left;']) !!}
                        {!! Form::number('age_to', 50, ['min' => 1, 'max' => 100, 'class' => 'form-control col-md-6', 'style' => 'width: 45%;float: right;']) !!}
                    </div>
                    <div class="form-group col-md-2">
                        {!! Form::label('eye', trans('profile.eye') ) !!}
                        {!! Form::select('eye', $selects['eye'] , '' ,  ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-2">
                        {!! Form::label('hair', trans('profile.hair') ) !!}
                        {!! Form::select('hair', $selects['hair'], '',  ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-2">
                        {!! Form::label('education', trans('profile.education') ) !!}
                        {!! Form::select('education', $selects['education'], '',  ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-2">
                        {!! Form::label('kids', trans('profile.kids') ) !!}
                        {!! Form::select('kids', $selects['kids'], '',  ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-2">
                        {!! Form::label('want_kids', trans('profile.want_kids') ) !!}
                        {!! Form::select('want_kids', $selects['want_k'], '',  ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-2">
                        {!! Form::label('family', trans('profile.family') ) !!}
                        {!! Form::select('family', $selects['family'], '',  ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-2">
                        {!! Form::label('religion', trans('profile.religion') ) !!}
                        {!! Form::select('religion', $selects['religion'], '',  ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-2">
                        {!! Form::label('smoke', trans('profile.smoke') ) !!}
                        {!! Form::select('smoke', $selects['smoke'], '',  ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-2">
                        {!! Form::label('drink', trans('profile.drink') ) !!}
                        {!! Form::select('drink', $selects['drink'], '',  ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                {{ Form::submit(trans('sender.submit-man'), ['class' => 'btn btn-success']) }}
            </div>
            {!! Form::close() !!}
        </div>
    </section>
@stop
@section('scripts')
    <script type="text/javascript" src="{{ url('/assets/js/bootstrap-fileinput-master/js/fileinput.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/js/file-input-init.js') }}"></script>
    <script>
        $(document).ready(function(){
            mans_id_array=[];
            @for($counter=0; $counter<count(unserialize($message[0]['mans_id'])); $counter++)
                mans_id_array[{{$counter}}]={{unserialize($message[0]['mans_id'])[$counter]}};
            @endfor


            var url = "/admin/sender/ajax";
            $.ajax({
                type: "POST",
                url: url,
                data: {mans_id_array: mans_id_array, _token: $('input[name="_token').val() },
                success: function(data)
                {
                    $( ".man-list #list" ).empty();
                    $( ".man-list #list" ).append( data ); // show response from the php script.
                }
            });
        });
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
        $("#ajax_man").submit(function(e) {

            var url = "/admin/sender/ajax"; // the script where you handle the form input.

            $.ajax({
                type: "POST",
                url: url,
                data: $("#ajax_man").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $( ".man-list #list" ).empty();
                    $( ".man-list #list" ).append( data ); // show response from the php script.
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    </script>
@stop