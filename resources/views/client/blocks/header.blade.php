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
                             <a href="#" class="btn btn-default" id="button-login"><i class="fa fa-user"></i> {{ trans('buttons.login') }} </a>
                        </div>
                        <div class="col-md-2 col-sm-3">
                            <a href="#" class="btn btn-default" id="button-register"><i class="fa fa-users"></i> {{ trans('buttons.signup') }} </a>
                        </div>
                    <!--end login buttons-->
                @endif
            </div>
        </div><!--end row-->

    </div>
</div>
@include('client.blocks.nav')