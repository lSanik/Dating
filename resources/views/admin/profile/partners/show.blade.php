@extends('admin.layout')

@section('styles')

@stop

@section('content')

    <div class="container">
        {{ $user->first_name }}
        {{ $user->last_name }}
        {{ $user->email }}

    </div>

@stop

@section('scripts')

@stop