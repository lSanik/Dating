@extends('admin.layout')

@section('styles')
    <link href="{{ url('/assets/css/bootstrap-reset.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/css/fileinput.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('assets/css/datepicker.css') }}">
@stop

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

            @if( !empty($why) && ( $user->status_id == 2 || $user->status_id == 3 || $user->status_id == 4 )   )
                <div class="alert alert-info">
                    @foreach($why as $w)
                        @if($w->meta_key == "status_comment")
                            <b><i>Причина:</i></b> {{ $w->meta_value }} <br/>
                        @endif
                    @endforeach
                </div>
            @endif
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#osn" aria-controls="osn" role="tab" data-toggle="tab">Онсновная информация</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Данные профиля</a></li>
                <li role="presentation"><a href="#photoalbums" aria-controls="photoalbums" role="tab" data-toggle="tab">Фотоальбомы</a></li>
                @if( Auth::user()->hasRole('Owner') || Auth::user()->hasRole('Moder') )
                    <li role="presentation"><a href="#status" aria-controls="status" role="tab" data-toggle="tab">Статус</a></li>
                @endif

            </ul>
            {!! Form::open(['url' => '#', 'class' => 'form', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="osn">
                        <div class="col-md-4 col-md-offset-4">
                            <h3> Основная информация профиля </h3>
                            <div class="form-group">
                                {!! Form::label('avatar', 'Аватар') !!}<br/>
                                <img width="373rem" src="{{ url('/uploads/girls/avatars/'. $user->avatar) }}" id="preview-avatar">
                                <input type="file" class="form-control file" name="avatar" accept="image/*" value="{{ $user->avatar }}">
                            </div>
                            <div class="form-group">
                                {!! Form::label('webcam', 'Вебкамера') !!}
                                <input type="checkbox" name="webcam"
                                    @if($user->webcam !== 0)
                                        checked
                                    @endif
                                >
                            </div>
                            <div class="form-group">
                                {!! Form::label('hot', 'Hot Block') !!}
                                <input type="checkbox" name="hot" {{ ($user->hot == 0) ?: 'checked' }}>
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
                                <select name="county" class="form-control">
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}"
                                                @if( $country->id == $user->country_id )
                                                selected="selected"
                                                @endif
                                                > {{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                {!! Form::label('state', 'Штат') !!}
                                {!! Form::hidden('user_state_id', $user->state_id ) !!}
                                <select name="state" class="form-control"></select>
                            </div>
                            <div class="form-group">
                                {!! Form::label('city', 'Город') !!}
                                {!! Form::hidden('user_city_id', $user->city_id ) !!}
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
                                <img width="373rem" src="{{ url('/uploads/girls/passports/'. $user->passport->cover) }}">
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
                    <!-- Photoalbums -->
                    <div role="tabpanel" class="tab-pane" id="photoalbums">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="row">
                                    <button type="button" class="btn btn-success pull-right" style="margin: 10px"><i class="fa fa-plus"></i>&nbsp;Добавить</button>
                                </div>
                                <div class="row">
                                    @todo вывод альбомов
                                </div>
                            </div>
                        </div>
                    </div>
                    @if( Auth::user()->hasRole('Owner') || Auth::user()->hasRole('Moder') )
                        <div role="tabpanel" class="tab-pane" id="status">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group" style="margin-top: 20px">

                                        <select name="status" class="form-control">
                                            @foreach($statuses as $status)
                                                <option value="{{ $status->id }}" {{ $status->id == $user->status_id ? "selected" : ''}}>{{ trans('status.'.$status->name) }}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">

                                    </div>
                                    <div class="form-group">
                                        <label for="why">Причина отказа (если есть):</label>
                                        <textarea name="why" class="form-control">
                                            @if( !empty($why) && ( $user->status_id == 2 || $user->status_id == 3 || $user->status_id == 4 )   )
                                                @foreach($why as $w)
                                                    @if($w->meta_key == "status_comment")
                                                         {{ $w->meta_value }}
                                                    @endif
                                                @endforeach
                                            @endif
                                        </textarea>
                                    </div>
                                    <div class="form-group text-center">
                                        <button class="btn btn-success status">Сохранить</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
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
                    $('select[name="state"]').empty();

                    for( var i = 0; i < response.length; i++ )
                    {
                        if( response[i].id == $('input[name="user_state_id"]').val() )
                            $('select[name="state"]').append("<option value='" + response[i].id + "' selected='selected'>" + response[i].name + "</option>");
                        else
                            $('select[name="state"]').append("<option value='" + response[i].id + "'>" + response[i].name + "</option>");
                    }
                },
                error: function( response ){
                    console.log( response )
                }
            });

            get_cities($id);
        }

        $(window).on('load', function(){

            get_states( $('select[name="county"]').val() );

        });

        $(function() {

            $('button.status').click(function(){



                $.ajax({
                    type: 'POST',
                    url: '{{ url('/admin/girl/changeStatus') }}',
                    data: { id: $('select[name="status"]').val(),
                            user_id: $('input[name="user_id"]').val(),
                            why: $('textarea[name="why"]').val(),
                            _token: $('input[name="_token"]').val() },
                    success: function( response ){
                        console.log(response);
                    },
                    error: function( response ){
                        console.log(response);
                    }
                });

            });

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