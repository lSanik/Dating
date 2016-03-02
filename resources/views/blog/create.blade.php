@extends('layouts.layout_editor')

@section('title', 'Create Post')

@section('main')

    <div class="error alert alert-danger"></div>
    <div class="success alert alert-success"></div>

    {{ Form::open(array('route' => 'posts.store')) }}
    <div class="title-editable" id="post-title"><h1>Enter post title</h1></div>
    <!-- Text field --> 
    {!! Form::label('title','Title') !!}
    {!! Form::text('title', null, ['class'=>'form-control title-editable', 'placeholder' => 'Title']) !!}
    <!-- Text field -->
    {!! Form::label('body','Body') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control body-editable', 'placeholder' => 'Body']) !!}

    <div class="body-editable" id="post-body"><p>Enter post body</p></div>
    {{ Form::submit('Save Post', array('class' => 'btn btn-primary', 'id' => 'form-submit')) }}

    {{ Form::close() }}

@stop