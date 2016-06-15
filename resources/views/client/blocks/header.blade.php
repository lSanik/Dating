<div id="header">
    <div class="container">
        <div class="row">

            <!-- Logo -->
            <div class="col-md-4 col-sm-4">
                <a href="{{ url('/') }}">
                    <img id="logo_img" src="http://seventhqueen.com/demo/sweetdatewp/wp-content/themes/sweetdate/assets/images/logo.png" alt="Sweet Date">
                </a>
            </div>
            <!--end logo-->

            <div class="col-md-8 col-sm-8 login-buttons">
                @if(!Auth::user())
                    <!--Login buttons-->
                <div class="col-md-3 col-lg-2 col-sm-4">
                    <li class="dropdown btn btn-default pull-right">
                        <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false">
                            <img src="{{ url('/assets/img/flags/'.App::getLocale().'.png') }}"
                                 alt="{{App::getLocale()}}">
                            <span>{{ trans( 'langs.'.App::getLocale() ) }}</span>
                            <b class=" fa fa-angle-down"></b>
                        </a>
                        <ul role="menu" class="dropdown-menu language-switch">
                            @foreach( Config::get('app.locales') as $locale )
                                @if( $locale != App::getLocale() )
                                    <li>
                                        <a tabindex="-1"
                                           href="/{{ $locale }}/{{ substr(Route::getCurrentRoute()->getPath(), 3) }}">
                                            <img src="{{ url('/assets/img/flags/'.$locale.'.png') }}" alt="{{$locale}}">
                                            <span> {{ trans('langs.'.$locale) }} </span>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                        </div>
                <div class="col-md-2 col-sm-4">
                            <button class="btn btn-default" id="button-register" data-toggle="modal" data-target="#registerModal"><i class="fa fa-users"></i> {{ trans('buttons.signup') }} </button>
                        </div>
                <div class="col-md-2 col-sm-4">
                    <button type="button" class="btn btn-default" id="button-login" data-toggle="modal"
                            data-target="#loginModal"><i class="fa fa-user"></i> {{ trans('buttons.login') }} </button>
                </div>
                    <!--end login buttons-->
                @else
                    <div class="col-md-12">
                        <li class="dropdown btn btn-default pull-right">
                            <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false">
                                <img src="{{ url('/assets/img/flags/'.App::getLocale().'.png') }}"
                                     alt="{{App::getLocale()}}">
                                <span>{{ trans( 'langs.'.App::getLocale() ) }}</span>
                                <b class=" fa fa-angle-down"></b>
                            </a>
                            <ul role="menu" class="dropdown-menu language-switch">
                                @foreach( Config::get('app.locales') as $locale )
                                    @if( $locale != App::getLocale() )
                                        <li>
                                            <a tabindex="-1"
                                               href="/{{ $locale }}/{{ substr(Route::getCurrentRoute()->getPath(), 3) }}">
                                                <img src="{{ url('/assets/img/flags/'.$locale.'.png') }}"
                                                     alt="{{$locale}}">
                                                <span> {{ trans('langs.'.$locale) }} </span>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        @if(Request::url() != 'http://dating.seoport.com.ua/profile/1')
                            <a href="/profile/{{ Auth::user()->id }}" class="btn btn-default pull-right"><i
                                        class="fa fa-user"></i> PROFILE</a>
                            <a href="/logout" class="btn btn-default pull-right"><i class="fa fa-sign-out"></i> LOG OUT</a>
                    </div>
                    @else
                        <a href="#" class="coin_btn pull-right"><i class="fa fa-btc" aria-hidden="true"></i> Coins</a>
                    @endif
                @endif
            </div>
        </div><!--end row-->
    </div>
</div>

@include('client.blocks.nav')