<div class="container">
    <div id="header">
        <div class="row">

            <!-- Logo -->
            <div class="col-md-4 col-sm-6">
                <a href="{{ url('/') }}">
                    <img id="logo_img" src="http://seventhqueen.com/demo/sweetdatewp/wp-content/themes/sweetdate/assets/images/logo.png" alt="Sweet Date">
                </a>
            </div>
            <!--end logo-->

            <div class="col-md-8 col-sm-6 login-buttons">
                @if(!Auth::user())
                    <!--Login buttons-->
                        <div class="col-md-2 col-md-offset-8 col-sm-3 col-sm-offset-5">
                             <button type="button" class="btn btn-default" id="button-login" data-toggle="modal" data-target="#loginModal"><i class="fa fa-user"></i> {{ trans('buttons.login') }} </button>
                        </div>
                        <div class="col-md-2 col-sm-3">
                            <button class="btn btn-default" id="button-register" data-toggle="modal" data-target="#registerModal"><i class="fa fa-users"></i> {{ trans('buttons.signup') }} </button>
                        </div>
                    <!--end login buttons-->
                @else
                    <div class="col-md-12">
                        @if(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Moder') || Auth::user()->hasRole('Partner'))
                            <a href="{{ url('/'.App::getLocale().'/admin/dashboard') }}" class="btn btn-default pull-right"> <i class="fa fa-user"></i> ADMIN</a>
                        @else
                            <a href="/profile/{{ Auth::user()->id }}" class="btn btn-default pull-right"><i class="fa fa-user"></i> PROFILE</a>
                        @endif
                        <a href="/logout" class="btn btn-default pull-right"><i class="fa fa-sign-out"></i> LOG OUT</a>
                    </div>
                @endif
            </div>
        </div><!--end row-->

    </div>
</div>
@include('client.blocks.nav')