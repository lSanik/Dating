@extends('admin.layout')

@section('styles')
    <link href="{{ url('/assets/css/bootstrap-reset.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/css/fileinput.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('assets/css/datepicker.css') }}">
@stop
<!-- todo DatePicker на дату выдачи паспорта и дату рождения  -->
@section('content')
    <section class="panel">
        <header class="panel-heading">
            Редактировать анкету
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
                <li role="presentation"><a href="#photoalbums" aria-controls="photoalbums" role="tab" data-toggle="tab">Фотоальбомы</a></li>
            </ul>
            {!! Form::open(['url' => 'admin/girl/store', 'class' => 'form', 'enctype' => 'multipart/form-data']) !!}
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="osn">
                        <div class="col-md-4 col-md-offset-4">
                            <h3> Основная информация профиля </h3>
                            <div class="form-group">
                                {!! Form::label('avatar', 'Аватар') !!}<br/>
                                <img src="{{ url('/uploads/girls/avatars/'. $user->avatar) }}" id="preview-avatar">
                                <input type="file" class="form-control file" name="avatar" accept="image/*" value="{{ $user->avatar }}">
                            </div>
                            <div class="form-group">
                                {!! Form::label('first_name', 'Имя') !!}
                                {!! Form::text('first_name', $user->first_name, ['class'=>'form-control', 'placeholder' => 'Name']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('second_name', 'Фамилия') !!}
                                {!! Form::text('second_name', $user->last_name, ['class'=>'form-control', 'placeholder' => 'Surname']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('birthday', 'Дата рождения') !!}
                                {!! Form::text('birthday', $user->profile->birthday, ['class' => 'form-control default-date-picker', 'disabled' => 'disabled']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('email','Email') !!}
                                {!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'email@email.com','disabled' => 'disabled', 'required' => 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('phone', 'Phone') !!}
                                {!! Form::text('phone', $user->phone, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('password', 'Password') !!}
                                {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('coutry', 'Cтрана') !!}
                                <select name="county" class="form-control"></select>
                            </div>
                            <div class="form-group">
                                {!! Form::label('state', 'Штат') !!}
                                <select name="state" class="form-control"></select>
                            </div>
                            <div class="form-group">
                                {!! Form::label('city', 'Город') !!}
                                <input type="hidden" name="city_id" value="{{ $user->city_id }}">
                                <select name="city" class="form-control"></select>
                            </div>
                            <div class="form-group">
                                {!! Form::label('passno','№ паспорта') !!}
                                {!! Form::text('passno', $user->passport->passno, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('pass_date', 'Дата выдачи паспорта') !!}
                                {!! Form::text('pass_date', $user->passport->date , ['class' => 'form-control default-date-picker', 'id' => 'datepicker', 'disabled' => 'disabled']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('avatar', 'Фото/Скан паспорта') !!}
                                <br/>
                                <img src="{{ url('girls/passports/'. $user->passport->cover) }}">
                                <input type="file" class="form-control file" name="pass_photo" value="{{ $user->passport->cover }}" disabled="disabled" accept="image/*">
                            </div>

                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">
                        <div class="col-md-4 col-md-offset-4">
                            <h3> Дополнительная информация профиля </h3>
                            <div class="form-group">
                                {!! Form::label('height', 'Рост') !!}
                                {!! Form::text('height', $user->profile->height, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('weight', 'Вес') !!}
                                {!! Form::text('weight', $user->profile->weight, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('occupation', 'Род деятельности') !!}
                                {!! Form::text('occupation', $user->profile->occupation, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('gender', 'Пол') !!}
                                {!! Form::select('gender', $selects['gender'], $user->profile->gender ,  ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('eye', 'Цвет глаз') !!}
                                {!! Form::select('eye', $selects['eye'] , $user->profile->eye ,  ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('hair', 'Цвет волос') !!}
                                {!! Form::select('hair', $selects['hair'], $user->profile->hair,  ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('education', 'Образование') !!}
                                {!! Form::select('education', $selects['education'],$user->profile->education,  ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('kids', 'Дети') !!}
                                {!! Form::select('kids', $selects['kids'],$user->profile->kids,  ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('want_kids', 'Желание завести детей') !!}
                                {!! Form::select('want_kids', $selects['want_k'],$user->profile->want_k,  ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('family', 'Семейное положение') !!}
                                {!! Form::select('family', $selects['family'], $user->profile->family,  ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('religion', 'Вероисповедание') !!}
                                {!! Form::select('religion', $selects['religion'], $user->profile->religion,  ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('smoke', 'Отношение к курению') !!}
                                {!! Form::select('smoke', $selects['smoke'], $user->profile->smoke,  ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('drink', 'Отношение к алкоголюы') !!}
                                {!! Form::select('drink', $selects['drink'], $user->profile->drink,  ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="photoalbums">

                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </section>

@stop

@section('scripts')

    <script src="{{ url('/assets/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/js/bootstrap-fileinput-master/js/fileinput.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/js/file-input-init.js') }}"></script>


    <script>
        $(function() {
            $('input[name="avatar"]').change(function(){
                $('#preview-avatar').css('display', 'none');
            });

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

        $(window).on('load', function(){

            var city_id = $('input[name="city_id"]').val();

        })
    </script>
@stop