<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false">
            <ul class="nav navbar-nav">
                <li><a href="/{{ App::getLocale() }}/">{{trans('nav.welcome')}}</a></li>
                <li><a href="/{{ App::getLocale() }}/about">{{trans('nav.about')}}</a></li>
                <li><a href="/{{ App::getLocale() }}/blog">{{trans('nav.blog')}}</a></li>
                <li><a href="/{{ App::getLocale() }}/pricing">{{trans('nav.pricing')}}</a></li>
                <li><a href="/{{ App::getLocale() }}/search">{{trans('nav.search')}}</a></li>
                <li><a href="/{{ App::getLocale() }}/contacts">{{trans('nav.contacts')}}</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="http://facebook.com" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a href="http://google.com" target="_blank"><i class="fa fa-google"></i></a></li>
                <li><a href="http://twitter.com" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li class="dropdown">
                    <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false">
                        <img src="{{ url('/assets/img/flags/'.App::getLocale().'.png') }}" alt="{{App::getLocale()}}">
                        <span>{{ trans( 'langs.'.App::getLocale() ) }}</span>
                        <b class=" fa fa-angle-down"></b>
                    </a>
                    <ul role="menu" class="dropdown-menu language-switch">
                        @foreach( Config::get('app.locales') as $locale )
                            @if( $locale != App::getLocale() )
                                <li>
                                    <a tabindex="-1" href="/{{ $locale }}/{{ substr(Route::getCurrentRoute()->getPath(), 3) }}">
                                        <img src="{{ url('/assets/img/flags/'.$locale.'.png') }}" alt="{{$locale}}">
                                        <span> {{ trans('langs.'.$locale) }} </span>
                                    </a>
                                </li>
                            @endif
                        @endforeach

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>