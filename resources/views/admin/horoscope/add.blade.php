@extends('admin.layout')

@section('content')
    <section class="panel panel-default">
        <header class="panel-heading">{{ $heading }}</header>
        <div class="panel-body">
            {!! Form::open(['url' => '/admin/horoscope/add']) !!}
                <div class="form-group">
                    <label for="start">{{ trans('horoscope.begin') }}</label>
                    <select name="start" class="form-control">
                        @foreach($horoscope as $h)
                            <option value="{{ $h->id }}">{{ trans('horoscope.'.$h->name) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="stop">{{ trans('horoscope.end') }}</label>
                    <select name="stop" class="form-control">
                        @foreach($horoscope as $h)
                            <option value="{{ $h->id }}">{{ trans('horoscope.'.$h->name) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <lable for="locale">{{ trans('horoscope.locale') }}</lable>
                    <select name="locale" class="form-control">
                        @foreach( Config::get('app.locales') as $locale )

                            <option value="{{ $locale }}"
                                    @if(App::getLocale() == $locale) selected="selected" @endif
                            >{{ trans('langs.'.$locale) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="text">{{ trans('horoscope.text') }}</label>
                    {!! Form::textarea('text', null, ['class' => 'form-control summernote']) !!}
                </div>
                <div class="text-center">
                    {!! Form::submit(trans('horoscope.save'), ['class' => 'btn btn-success']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </section>
@stop

@section('styles')
    <link href="{{ url('/assets/vendor/summernote/dist/summernote.css') }}" rel="stylesheet">
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

@section('scripts')
    <script src="{{ url('/assets/vendor/summernote/dist/summernote.min.js') }}"></script>

    <script type="text/javascript" src="{{ url('/assets/js/bootstrap-fileinput-master/js/fileinput.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/js/file-input-init.js') }}"></script>

    <script>
        $(document).ready(function(){

            $('.summernote').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ]
            });

            $("#image").fileinput();
            $("#files").fileinput();

        });
    </script>
@stop