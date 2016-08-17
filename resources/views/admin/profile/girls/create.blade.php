@extends('admin.layout')

@section('styles')
    <!-- ink href="{{ url('/assets/css/bootstrap-reset.css') }}" rel="stylesheet" -->
    <link href="{{ url('/assets/css/fileinput.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/datepicker.css') }}" rel="stylesheet">



@stop

@section('content')

    <section class="panel">
        <header class="panel-heading">
            Добавить новую анкету
        </header>
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
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#osn" aria-controls="osn" role="tab" data-toggle="tab">Онсновная информация</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Данные профиля</a></li>
            </ul>
            {!! Form::open(['url' => 'admin/girl/store', 'class' => 'form', 'enctype' => 'multipart/form-data']) !!}
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="osn">
                        <div class="col-md-4 col-md-offset-4">
                            <h3> Основная информация профиля </h3>
                            <div class="form-group">
                                {!! Form::label('avatar', 'Аватар') !!}
                                <input type="file" class="form-control file" name="avatar" accept="image/*">
                            </div>
                            <div class="form-group">
                                {!! Form::label('webcam', 'Вебкамера') !!}
                                <input type="checkbox" name="webcam">
                            </div>
                            <div class="form-group">
                                {!! Form::label('hot', 'Вебкамера') !!}
                                <input type="checkbox" name="hot">
                            </div>
                            <div class="form-group">
                                {!! Form::label('first_name', 'Имя') !!}
                                {!! Form::text('first_name', null, ['class'=>'form-control', 'placeholder' => 'Name']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('second_name', 'Фамилия') !!}
                                {!! Form::text('second_name', null, ['class'=>'form-control', 'placeholder' => 'Surname']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('birthday', 'Дата рождения') !!}
                                {!! Form::text('birthday', null, ['class' => 'form-control default-date-picker']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('email','Email') !!}
                                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'email@email.com', 'required' => 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('phone', 'Phone') !!}
                                {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('password', 'Password') !!}
                                {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('coutry', 'Cтрана') !!}

                                <select name="county" class="form-control">
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}"> {{ $country->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                {!! Form::label('state', 'Штат') !!}
                                <select name="state" class="form-control"></select>
                            </div>
                            <div class="form-group">
                                {!! Form::label('city', 'Город') !!}
                                <select name="city" class="form-control"></select>
                            </div>
                            <div class="form-group">
                                {!! Form::label('passno','№ паспорта') !!}
                                {!! Form::text('passno', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('pass_date', 'Дата выдачи паспорта') !!}
                                {!! Form::text('pass_date', null, ['class' => 'form-control default-date-picker', 'id' => 'datepicker']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('pass_photo', 'Фото/Скан паспорта') !!}
                                <input type="file" class="form-control file" name="pass_photo[]" accept="image/*" multiple>
                            </div>

                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">
                        <div class="col-md-4 col-md-offset-4">
                            <h3> Дополнительная информация профиля </h3>
                            <div class="form-group">
                                {!! Form::label('height', 'Рост') !!}
                                {!! Form::text('height', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('weight', 'Вес') !!}
                                {!! Form::text('weight', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('occupation', 'Род деятельности') !!}
                                {!! Form::text('occupation', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('gender', 'Пол') !!}

                                <select name="gender" class="form-control">
                                    @foreach($selects['gender'] as $key => $value)
                                        <option value="{{ $key }}"> {{ trans('profile.'.$value) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                {!! Form::label('eye', 'Цвет глаз') !!}
                                <select name="eye" class="form-control">
                                    @foreach($selects['eye'] as $key => $value)
                                        <option value="{{ $key }}"> {{ trans('profile.'.$value) }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                {!! Form::label('hair', 'Цвет волос') !!}
                                <select name="hair" class="form-control">
                                    @foreach($selects['hair'] as $key => $value)
                                        <option value="{{ $key }}"> {{ trans('profile.'.$value) }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                {!! Form::label('education', 'Образование') !!}
                                {!! Form::select('education', $selects['education'], null,['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('kids', 'Дети') !!}
                                <select name="kids" class="form-control">
                                    @foreach($selects['kids'] as $key => $value)
                                        <option value="{{ $key }}"> {{ trans('profile.'.$value) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                {!! Form::label('want_kids', 'Желание завести детей') !!}
                                <select name="want_k" class="form-control">
                                    @foreach($selects['want_k'] as $key => $value)
                                        <option value="{{ $key }}"> {{ trans('profile.'.$value) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                {!! Form::label('family', 'Семейное положение') !!}
                                <select name="family" class="form-control">
                                    @foreach($selects['family'] as $key => $value)
                                        <option value="{{ $key }}"> {{ trans('profile.'.$value) }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                {!! Form::label('religion', 'Вероисповедание') !!}
                                <select name="religion" class="form-control">
                                    @foreach($selects['religion'] as $key => $value)
                                        <option value="{{ $key }}"> {{ trans('profile.'.$value) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                {!! Form::label('smoke', 'Отношение к курению') !!}
                                <select name="smoke" class="form-control">
                                    @foreach($selects['smoke'] as $key => $value)
                                        <option value="{{ $key }}"> {{ trans('profile.'.$value) }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                {!! Form::label('drink', 'Отношение к алкоголюы') !!}
                                <select name="drink" class="form-control">
                                    @foreach($selects['drink'] as $key => $value)
                                        <option value="{{ $key }}"> {{ trans('profile.'.$value) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-inline">
                                <header>Ищу (возраст)</header>
                                <div class="col-md-6">
                                    {!! Form::label('l_age_start', 'От: ') !!}
                                    {!! Form::number('l_age_start', '18', ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('l_age_stop', 'До: ') !!}
                                    {!! Form::number('l_age_stop', '40', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('looking', 'О партнере ') !!}
                                <textarea class="form-control" name="looking"></textarea>
                            </div>
                            <div class="form-group">
                                {!! Form::label('about', 'О девушке ') !!}
                                <textarea class="form-control" name="about"></textarea>
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </section>

@stop

@section('scripts')
    <script type="text/javascript" src="{{ url('/assets/js/jquery-ui_jquery-ui-1.10.1.custom.min.js') }}"></script>

    <!--bootstrap picker-->
    <script type="text/javascript" src="{{ url('/assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}"></script>

    <script type="text/javascript" src="{{ url('/assets/js/bootstrap-fileinput-master/js/fileinput.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/js/file-input-init.js') }}"></script>

    <script>
        $(function() {


            $('.default-date-picker').datepicker();


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