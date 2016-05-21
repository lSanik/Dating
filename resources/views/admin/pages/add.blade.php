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

    <section class="panel">
        <header class="panel-heading">{{ trans('pages.add') }}</header>
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
            {!! Form::open(['url' => '/admin/pages/add', 'class' => 'form', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="col-md-9">
                    <div class="form-group col-md-12">
                        <label for="title">{{ trans('pages.title') }}</label>
                        {!! Form::input('text', 'title', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-8">
                        <label for="slug">{{ trans('pages.slug') }}</label>
                        {!! Form::input('text', 'slug', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-4">
                        <label for="lang">{{ trans('pages.language') }}</label>
                        <select name="locale" class="form-control">
                            @foreach( Config::get('app.locales') as $locale )

                                <option value="{{ $locale }}"
                                        @if(App::getLocale() == $locale) selected="selected" @endif
                                >{{ trans('langs.'.$locale) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="body">{{ trans('pages.body') }}</label>
                        <textarea name="body" class="summernote"></textarea>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="image">{{ trans('pages.image') }}</label>
                        <input type="file" name="image" accept="image/*" id="image">
                    </div>
                    <div class="form-group">
                        <div class="fallback">
                            <label for="files[]">{{ trans('pages.files') }}</label>
                            <input name="files[]" type="file" id="files" multiple />
                        </div>
                    </div>
                    <div class="form-group text-center">
                        {{ Form::submit(trans('pages.submit'), ['class' => 'btn btn-success']) }}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </section>
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