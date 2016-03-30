@extends('admin.layout')

@section('styles')
    <link href="{{ url('/assets/css/fileinput.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/datepicker.css') }}" rel="stylesheet">

    <style>
        .active { display: block }
        .hidden { display: none }
    </style>
@stop

@section('content')

    <section class="panel">
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
            <div class="col-md-4 col-md-offset-4">
                {!! Form::open(['url' => 'admin/gifts/store', 'class' => 'form', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {!! Form::label('image', 'Фото подарка') !!}
                        <input type="file" class="form-control file" name="image" accept="image/*">
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('lang', 'Язык') !!}
                            <select name="lang" class="form-control">
                                @foreach(Config::get('app.locales') as $locale)
                                    @if(App::getLocale() == $locale)
                                        <option value="{{ $locale }}" selected="selected"> {{ trans('langs.'.$locale) }} </option>
                                    @else
                                        <option value="{{ $locale }}"> {{ trans('langs.'.$locale) }} </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('price', 'Цена') !!}
                            {!! Form::text('price', null, ['class' => 'form-control', 'pattern' => '\-?\d+(\.\d{0,})?']) !!}
                        </div>
                    </div>

                    @foreach( Config::get('app.locales') as $locale )
                        <div class="hidden" id="{{ $locale }}">

                            <div class="form-group">
                                {!! Form::label('title'.$locale, 'Название ('.trans('langs.'.$locale).')') !!}
                                {!! Form::text('title_'.$locale, null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('description'.$locale, 'Описание ('.trans('langs.'.$locale).')') !!}
                                {!! Form::text('description_'.$locale, null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    @endforeach



                    <div class="form-group text-center">
                        {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>

@stop

@section('scripts')
    <script type="text/javascript" src="{{ url('/assets/js/bootstrap-fileinput-master/js/fileinput.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/js/file-input-init.js') }}"></script>

    <script>
        $(document).ready(function(){
            var prev = $('select[name="lang"]').val();

            $("#"+prev).toggleClass('hidden');

            $('select[name="lang"]').change(function(){

                var lang = $(this).val();
                $("#"+lang).toggleClass('hidden');
                $("#"+prev).toggleClass('hidden');
                prev = lang;
            });


        });
    </script>
@stop