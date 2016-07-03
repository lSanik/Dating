@extends('client.profile.profile')

@section('profileContent')
    <a href="{{ url('/'. App::getLocale() .'/profile/'. Auth::user()->id .'/album/add') }}">{{ trans('profile.add') }}</a>
@stop