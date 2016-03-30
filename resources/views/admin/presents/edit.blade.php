@extends('admin.layout')

@section('styles')
    <link href="{{ url('/assets/css/fileinput.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/datepicker.css') }}" rel="stylesheet">
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
                {!! Form::open(['url' => 'admin/gifts/update/'.$present->id, 'class' => 'form', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {!! Form::label('image', 'Фото подарка') !!}<br/>
                    <img src="{{ url($present->image) }}" alt="{{ $present->image }}" id="preview_image"><br/>
                    <input type="file" class="form-control file" name="image" accept="image/*" value="{{ $present->image }}">
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('lang', 'Язык') !!}
                        <select name="lang" class="form-control">
                            @foreach(Config::get('app.locales') as $locale)

                                @if( $locale == $loc->locale)
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
                        {!! Form::text('price', $present->price, ['class' => 'form-control', 'pattern' => '\-?\d+(\.\d{0,})?']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('title', 'Название') !!}
                    {!! Form::text('title', $loc->title, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Описание') !!}
                    {!! Form::text('description', $loc->description, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group text-center">
                    {!! Form::hidden('present_id', $present->id) !!}
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

        $(function(){
            var lang = $('select[name="lang"]').val();

            $('input[name="image"]').change(function(){
                 $('#preview_image').css('display', 'none');
            });

            $('select[name="lang"]').change(function(){

                var id = $('input[name="present_id"]').val();
                lang = $(this).val();

                check(id, lang);
            });
        });

        function check(id, code)
        {
            $.ajax({
                type: 'POST',
                url: '{{ route("check_lang") }}',
                data: { id: id, code: code, _token: $('input[name="_token"]').val() },
                success: function( response ){
                    if( response )
                    {
                        $('input[name="title"]').val( response.title );
                        $('input[name="description"]').val( response.description );
                    } else {
                        $('input[name="title"]').val("");
                        $('input[name="description"]').val("");
                    }
                },
                error: function( response ){
                   // console.log( response )
                }
            });
        }

        function save(id, lang)
        {

          //@todo Save function
        }

    </script>

@stop