@extends('admin.layout')

@section('styles')
    <link href="{{ url('/assets/css/bootstrap-reset.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/css/fileinput.css') }}" rel="stylesheet">
@stop

@section('content')
    <div class="row">
        <!-- Form -->
        {!! Form::open(['url' => '/admin/partner/store', 'class' => 'form-horizontal']) !!}
        <div class="col-lg-6">
            <section class="panel">
                <header class="panel-heading">
                    Основная информация
                </header>
                <div class="panel-body">
                        <div class="form-group">
                            <label for="first_name" class="col-lg-2 col-sm-2 control-label">Имя</label>
                            <div class="col-lg-10">
                                {!! Form::text('first_name', null, ['class'=>'form-control', 'placeholder' => '', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="last_name" class="col-lg-2 col-sm-2 control-label">Фамилия</label>
                            <div class="col-lg-10">
                                {!! Form::text('last_name', null, ['class'=>'form-control', 'placeholder' => '', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-lg-2 col-sm-2 control-label">Email</label>
                            <div class="col-lg-10">
                                {!! Form::email('email', null, ['class'=>'form-control', 'placeholder' => '', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-lg-2 col-sm-2 control-label">Password</label>
                            <div class="col-lg-10">
                                <input type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-lg-2 col-sm-2 control-label">Фото</label>
                            <div class="col-lg-10">
                                <input type="file" class="form-control file" name="avatar">
                            </div>
                        </div>
                </div>

            </section>
        </div>

        <div class="col-lg-6">
            <section class="panel">
                <header class="panel-heading">
                    Дополнительная информация
                </header>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="first_name" class="col-lg-2 col-sm-2 control-label">Компания</label>
                        <div class="col-lg-10">
                            {!! Form::text('company', null, ['class'=>'form-control', 'placeholder' => '']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="last_name" class="col-lg-2 col-sm-2 control-label">Инфо</label>
                        <div class="col-lg-10">
                            {!! Form::textarea('info', null, ['class'=>'form-control', 'placeholder' => '', 'rows' => 4]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-lg-2 col-sm-2 control-label">Контакты</label>
                        <div class="col-lg-10">
                            {!! Form::textarea('contacts', null, ['class'=>'form-control', 'placeholder' => '', 'rows' => 4]) !!}
                        </div>
                    </div>

                    <div class="panel-footer text-center" style="background-color: white">
                        <button type="submit" class="btn btn-success"> Добавить партнера </button>
                    </div>
                </div>
            </section>
        </div>
        {!! Form::close() !!}
    </div>
@stop

@section('scripts')
        <!--bootstrap-fileinput-master-->
    <script type="text/javascript" src="{{ url('/assets/js/bootstrap-fileinput-master/js/fileinput.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/js/file-input-init.js') }}"></script>
@stop