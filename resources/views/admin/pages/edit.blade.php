@extends('admin.layout')


@section('styles')
    <link href="{{ url('/assets/vendor/summernote/dist/summernote.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/css/bootstrap-reset.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/css/fileinput.css') }}" rel="stylesheet">

    <style>
        .fileinput-upload-button{
            display: none;
        }

    </style>
@stop


@section('content')
    <section class="panel">
        <header class="panel-heading">{{ trans('pages.edit') }}</header>
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
            {!! Form::open(['url' => '/admin/pages/edit/'.$page->id, 'class' => 'form', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                {!! Form::input('hidden', 'pageId', $page->id) !!}
            <div class="col-md-9">
                <div class="form-group col-md-12">
                    <label for="title">{{ trans('pages.title') }}</label>
                    {!! Form::input('text', 'title', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-8">
                    <label for="slug">{{ trans('pages.slug') }}</label>
                    {!! Form::input('text', 'slug', $page->slug, ['class' => 'form-control']) !!}
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
                    <img src="{{ url('/uploads/pages/images/'.$page->image) }}" id="preview" width="100%">
                    <input type="file" name="image" accept="image/*" id="image">
                </div>
                <div class="form-group">

                    <div class="fallback">
                        <label for="files[]">{{ trans('pages.files') }}</label>
                        <br/>
                        @foreach($media as $m)
                            <p data-id="{{ $m->id }}">{{ $m->media }} <i class="fa fa-times removeFile" style="color: red" ></i></p>
                        @endforeach
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
    <div class="hidden">
        @foreach( $trans as $t )
            <div id="{{ $t->locale }}">
                <div class="title">{{ $t->title }}</div>
                <div class="body">{{ $t->body }}</div>
            </div>
        @endforeach
    </div>
@stop

@section('scripts')
    <script src="{{ url('/assets/vendor/summernote/dist/summernote.min.js') }}"></script>

    <script type="text/javascript" src="{{ url('/assets/js/bootstrap-fileinput-master/js/fileinput.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/js/file-input-init.js') }}"></script>

    <script>
        $(function(){
            /** Append data */

            var locale = $('select[name="locale"]').val()

            var id = '#'+locale;
            var title = $(id + ' .title').text();
            var body = $(id + ' .body').text();


            $('input[name="title"]').val( title );
            $('textarea[name="body"]').val( body );
        });

        $(document).ready(function(){


            $('select[name="locale"]').change(function(){
                var locale = $(this).val();
                var id = '#'+locale;
                var title = $(id + ' .title').text();
                var body = $(id + ' .body').text();


                $('input[name="title"]').empty().val( title );
                $('textarea[name="body"]').empty().val( body );
                $('.note-editable').empty().append( body );

            });

            /** Init editors and forms */
            $('.summernote').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ],
                height: 200,                 // set editor height

                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor

                focus: true,                 // set focus to editable area after initializing summernote,

            });

            $("#image").fileinput();
            $("#files").fileinput();

            /** Remove files */
            $('input[name="image"]').change(function(){
               $("#preview").remove();
            });

            $('.removeFile').click(function(){
                var ID   = $(this).parent().data('id');
                var file = $(this).parent().text();

                $.ajax({
                    type: "POST",
                    url: '{{ url('/admin/pages/dropFile') }}',
                    data: {ID: ID, file: file, _token: '{{ csrf_token() }}' },
                    success: function(response){
                        $(this).parent().remove();
                    },
                    error: function(response){
                        alert("Ошибка удаления фала");
                    }
                });
            });

        });

    </script>
@stop