@extends('client.app')

@section('content')
    <div class="container-fluid">

            <div class="col-md-12">
                <div class="col-md-2 col-sm-2" id="profileMenu">
                    @include('client.blocks.profile-sidebar')
                </div>
                <div class="col-md-9 col-sm-9" id="profileFields">
                    @yield('profileContent')
                </div>
            </div>

    </div>
@stop

@section('styles')

@stop

@section('scripts')

@stop