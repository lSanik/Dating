@extends('client.profile.profile')

@section('profileContent')
    @foreach($smiles as $s)
        <p class="alert alert-info">
            {{ trans('profile.smile') }}
            <a href="{{ url('/'.App::getLocale().'/profile/show/'.$s->id) }}">
                <b>{{ $s->first_name }}</b>
            </a>
        </p>
    @endforeach
@stop