@extends('admin.layout')

@section('styles')
    <link href="{{ url('/assets/css/bootstrap-reset.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/css/fileinput.css') }}" rel="stylesheet">
@stop

@section('content')
    <div class="row">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

                    <!-- Form -->
            {!! Form::open(['url' => '#', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
            {!! Form::hidden('id', $user->id) !!}
            <div class="col-lg-6">
                <section class="panel">
                    <header class="panel-heading">
                        {{trans('profile.mainInformation')}}
                    </header>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="first_name" class="col-lg-2 col-sm-2 control-label">{{trans('profile.name')}}</label>
                            <div class="col-lg-10">
                                {!! Form::text('first_name', $user->first_name,
                                ['class'=>'form-control', 'placeholder' => '', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="last_name" class="col-lg-2 col-sm-2 control-label">{{trans('profile.surname')}}</label>
                            <div class="col-lg-10">
                                {!! Form::text('last_name', $user->last_name,
                                ['class'=>'form-control', 'placeholder' => '', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-lg-2 col-sm-2 control-label">Email</label>
                            <div class="col-lg-10">
                                {!! Form::email('email', $user->email,
                                ['class'=>'form-control', 'placeholder' => '', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-lg-2 col-sm-2 control-label">{{trans('profile.phone')}}</label>
                            <div class="col-lg-10">
                                {!! Form::text('phone', $user->phone,
                                ['class'=>'form-control', 'placeholder' => '', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-lg-2 col-sm-2 control-label">{{trans('profile.password')}}</label>
                            <div class="col-lg-10">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="avatar" class="col-lg-2 col-sm-2 control-label">{{trans('profile.photo')}}</label>
                            <div class="col-lg-10">
                                <img src="{{ url('/uploads/admins/'.$user->avatar) }}" id="preview" width="100%">
                                <input type="file" class="form-control file" name="avatar">
                            </div>
                        </div>
                    </div>

                </section>
            </div>

            <div class="col-lg-6">
                <section class="panel">
                    <header class="panel-heading">
                        {{trans('profile.additionalInformation')}}
                    </header>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="first_name" class="col-lg-2 col-sm-2 control-label">{{trans('profile.company')}}</label>
                            <div class="col-lg-10">
                                {!! Form::text('company', $user->company_name,
                                 ['class'=>'form-control', 'placeholder' => '']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="last_name" class="col-lg-2 col-sm-2 control-label">{{trans('profile.info')}}</label>
                            <div class="col-lg-10">
                                {!! Form::textarea('info', $user->info,
                                ['class'=>'form-control', 'placeholder' => '', 'rows' => 4]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-lg-2 col-sm-2 control-label">{{trans('profile.contacts')}}</label>
                            <div class="col-lg-10">
                                {!! Form::textarea('contacts', $user->contacts,
                                ['class'=>'form-control', 'placeholder' => '', 'rows' => 4]) !!}
                            </div>
                        </div>

                        <div class="panel-footer text-center" style="background-color: white">
                            <button type="submit" class="btn btn-success"> {{trans('profile.update')}}</button>
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

    <script>
        $(document).ready(function(){
            $('input[type="file"]').change(function(){
                $('#preview').css('display', 'none');
            });
        });
    </script>
@stop