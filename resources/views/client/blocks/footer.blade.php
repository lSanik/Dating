<div class="container">
    <div id="footer">
        <div class="row text-center">
            <div class="col-md-3 col-sm-6">
                <div id="menu__f">
                    <span>{{trans('nav.company')}}</span>
                    <ul class="nav">
                        <li><a href="/{{ App::getLocale() }}/">{{trans('nav.welcome')}}</a></li>
                        <li><a href="/{{ App::getLocale() }}/about">{{trans('nav.about')}}</a></li>
                        <li><a href="/{{ App::getLocale() }}/blog">{{trans('nav.blog')}}</a></li>
                        <li><a href="/{{ App::getLocale() }}/pricing">{{trans('nav.pricing')}}</a></li>
                        <li><a href="/{{ App::getLocale() }}/search">{{trans('nav.search')}}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div id="menu__f">
                    <span>{{trans('nav.aboutUs')}}</span>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div id="menu__f">
                    <span>{{trans('nav.dating')}}</span>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div id="menu__f">
                <span>{{trans('nav.social')}}</span>
                    <ul class="nav">
                        @foreach($pages as $page)
                            <li><a href="{{ $page->slug }}">{{ $page->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <hr style="color: #ccc">
        <div class="row text-center">
            <div class="col-md-6">
                COPY
            </div>
            <div class="col-md-6">
                <i class="fa fa-cc-visa" aria-hidden="true"></i>  <i class="fa fa-cc-mastercard" aria-hidden="true"></i>  <i class="fa fa-cc-paypal" aria-hidden="true"></i>
            </div>
        </div>
    </div>
</div>

