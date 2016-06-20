@extends('client.profile.profile')

@section('profileContent')
    <div class="col-md-10 col-md-offset-1">
        <header>{{ trans('profile.add_new_album') }}</header>
        <div class="body">
            {!! Form::open(['enctype' => "multipart/form-data"]) !!}
            <div class="form-group">
                {!! Form::label(trans('albums.name')) !!}
                <input name="name" type="text" class="form-control">
            </div>
            <div class="form-group">
                {!! Form::label(trans('albums.cover')) !!}
                {!! Form::file('cover_image', ['class' => 'file', 'accept' => 'image/*']) !!}
            </div>
            <div class="form-group">
                {!! Form::label(trans('albums.choose')) !!}

                <input type="file" name="files[]" multiple="multiple" class="file" accept="image/*">
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-lg btn-success" value="{{ trans('albums.send') }}">
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
ile
@section('styles')
    <link href="{{ url('/assets/css/fileinput.css') }}" rel="stylesheet">
@stop

@section('scripts')
    <script type="text/javascript" src="{{ url('/assets/js/bootstrap-fileinput-master/js/fileinput.js') }}"></script>

@stop