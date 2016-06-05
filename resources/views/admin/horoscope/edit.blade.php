@extends('admin.layout')

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

@section('content')
    <section class="panel panel-default">
        <header class="panel-heading">{{ $heading }}</header>
        <div class="panel-body">
            {!! Form::open(['url' => '/admin/horoscope/edit/'.$id]) !!}
                {!! Form::hidden('row', '') !!}
                <div class="form-group">
                    <label for="start">{{ trans('horoscope.begin') }}</label>
                    <b>{{ $horoscope[$hor->primary] }}</b>
                </div>
                <div class="form-group">
                    <label for="stop">{{ trans('horoscope.end') }}</label>
                    <b>{{ $horoscope[$hor->secondary] }}</b>
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
        <div class="hidden">
            @foreach($trans as $t)
                <div id="{{ $t->locale }}">
                    <div class="text">{{ $t->text }}</div>
                    <div class="id">{{$t->id}}</div>
                </div>
            @endforeach
        </div>
    </section>
@stop


@section('scripts')
    <script src="{{ url('/assets/vendor/summernote/dist/summernote.min.js') }}"></script>

    <script type="text/javascript" src="{{ url('/assets/js/bootstrap-fileinput-master/js/fileinput.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/js/file-input-init.js') }}"></script>

    <script>
        $(function(){
            /** Append data */
            var locale = $('select[name="locale"]').val();
            var id = '#'+locale;

            var text = $(id + ' .text').text();
            var row = $(id + ' .id').text();

            $('input[name="row"]').val(row);
            $('textarea[name="text"]').val(text);
        });

        $(document).ready(function(){

            $('select[name="locale"]').change(function(){
                var locale = $(this).val();
                var id = '#'+locale;
                var text = $(id + ' .text').text();

                var row = $(id + ' .id').text();

                $('input[name="row"]').val(row);

                $('textarea[name="text"]').val(text);
                $('.note-editable').empty().append( text );
            });

            /** Init editor */
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
        });


    </script>
@stop