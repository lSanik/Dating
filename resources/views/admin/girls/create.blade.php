@extends('admin.layout')

@section('styles')
    <link rel="stylesheet" href="{{ url('assets/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/jquery-ui.theme.min.css') }}">


@stop

@section('content')

    <section class="panel">
        <header class="panel-heading">
            Добавить новую анкету
        </header>
        <div class="panel-body">
            <div class="row">
                {!! Form::open(['url' => 'admin/girl/store', 'class' => 'form']) !!}
                    <div class="col-md-6">

                        <div class="form-group">
                            <div class="col-md-6">{!! Form::label('first_name', 'Имя') !!}</div>
                            <div class="col-md-6">{!! Form::text('first_name', null, ['class'=>'form-control', 'placeholder' => 'Name']) !!}</div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">{!! Form::label('second_name', 'Фамилия') !!}</div>
                            <div class="col-md-6">{!! Form::text('second_name', null, ['class'=>'form-control', 'placeholder' => 'Surname']) !!}</div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">{!! Form::label('passno','№ паспорта') !!}</div>
                            <div class="col-md-6">{!! Form::text('passno', null, ['class' => 'form-control']) !!}</div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">{!! Form::label('pass_date', 'Дата выдачи') !!}</div>
                            <div class="col-md-6">{!! Form::text('pass_date', \Carbon\Carbon::now() , ['class' => 'form-control hasDatepicker', 'id' => 'datepicker']) !!}</div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">{!! Form::label('email','Email') !!}</div>
                            <div class="col-md-6">{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'email@email.com', 'required' => 'required']) !!}</div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">{!! Form::label('password', 'Password') !!}</div>
                            <div class="col-md-6">{!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}</div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">{!! Form::label('coutry', 'Cтрана') !!}</div>
                            <div class="col-md-6">
                                <select name="county" class="form-control">
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}"> {{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">{!! Form::label('state', 'Штат') !!}</div>
                            <div class="col-md-6">
                                <select name="state" class="form-control">

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">{!! Form::label('city', 'Город') !!}</div>
                            <div class="col-md-6">
                                <select name="city" class="form-control">

                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-md-6">{!! Form::label('gender', 'Пол') !!}</div>
                            <div class="col-md-6">{!! Form::select('gender', $selects['gender'],'female',  ['class' => 'form-control']) !!}</div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">{!! Form::label('eye', 'Цвет глаз') !!}</div>
                            <div class="col-md-6">{!! Form::select('eye', $selects['eye'] ,null,  ['class' => 'form-control']) !!}</div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">{!! Form::label('hair', 'Цвет волос') !!}</div>
                            <div class="col-md-6">{!! Form::select('hair', $selects['hair'],null,  ['class' => 'form-control']) !!}</div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">{!! Form::label('education', 'Образование') !!}</div>
                            <div class="col-md-6">{!! Form::select('education', $selects['education'],null,  ['class' => 'form-control']) !!}</div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">{!! Form::label('kids', 'Дети') !!}</div>
                            <div class="col-md-6">{!! Form::select('kids', $selects['kids'],null,  ['class' => 'form-control']) !!}</div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">{!! Form::label('want_k', 'Желание завести детей') !!}</div>
                            <div class="col-md-6">{!! Form::select('want_k', $selects['want_k'],null,  ['class' => 'form-control']) !!}</div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">{!! Form::label('family', 'Семейное положение') !!}</div>
                            <div class="col-md-6">{!! Form::select('family', $selects['family'],null,  ['class' => 'form-control']) !!}</div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">{!! Form::label('religion', 'Вероисповедание') !!}</div>
                            <div class="col-md-6">{!! Form::select('religion', $selects['religion'],null,  ['class' => 'form-control']) !!}</div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">{!! Form::label('smoke', 'Отношение к курению') !!}</div>
                            <div class="col-md-6">{!! Form::select('smoke', $selects['smoke'],null,  ['class' => 'form-control']) !!}</div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">{!! Form::label('drink', 'Отношение к алкоголюы') !!}</div>
                            <div class="col-md-6">{!! Form::select('drink', $selects['drink'],null,  ['class' => 'form-control']) !!}</div>
                        </div>
                    </div>
                    <div class="text-center">
                        {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>







@stop

@section('scripts')

    <script src="{{ url('/assets/js/jquery-ui.min.js') }}"></script>

    <script>
        $(function() {
            $( "#datepicker" ).datepicker();

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
                })

            });
        });
    </script>
@stop