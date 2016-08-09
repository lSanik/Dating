<!-- sidebar left start-->
<div class="sidebar-left">

    <div class="sidebar-left-info">
        <!-- visible small devices start-->
        <div class=" search-field">  </div>
        <!-- visible small devices end-->

        <!--sidebar nav start-->
        <ul class="nav nav-pills nav-stacked side-navigation">
            <li >
                <a href="{{ url(App::getLocale().'/admin/dashboard') }}">
                    <i class="fa fa-home"></i>
                    <span>{{ trans('admin/sidebar-left.control') }}</span>
                </a>
            </li>
            @if( Auth::User()->hasRole('Owner') )
            <li class="menu-list">
                <a href="#"><i class="fa fa fa-money"></i>
                    <span>{{ trans('admin/sidebar-left.finance') }}</span></a>
                <ul class="child-list">
                    <li><a href="{{ url(App::getLocale().'/admin/finance/stat') }}">{{ trans('admin/sidebar-left.statistics') }}</a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/finance/control') }}"> {{ trans('admin/sidebar-left.control') }}</a></li>
                </ul>
            </li>
            @endif
            <li class="">
                <h3 class="navigation-title">{{ trans('admin/sidebar-left.profiles') }}</h3>
            </li>
            @if( Auth::User()->hasRole('Owner') )
            <li class="menu-list">
                <a href=""><i class="fa fa-user-secret"></i>
                    <span>{{ trans('admin/sidebar-left.partners') }}</span></a>
                <ul class="child-list">
                    <li><a href="{{ url(App::getLocale().'/admin/partners/') }}"> {{ trans('admin/sidebar-left.allPartners') }}</a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/partner/new') }}"> {{ trans('admin/sidebar-left.addPartner') }}</a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/partner/stat') }}"> {{ trans('admin/sidebar-left.partnersStatistics') }}</a></li>
                </ul>
            </li>
            <li class="menu-list">
                <a href=""><i class="fa fa-user"></i>
                    <span>{{ trans('admin/sidebar-left.moderators') }}</span></a>
                <ul class="child-list">
                    <li><a href="{{ url(App::getLocale().'/admin/moderators') }}"> {{ trans('admin/sidebar-left.allModerators') }}</a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/moderator/new') }}"> {{ trans('admin/sidebar-left.addModerator') }}</a></li>
                </ul>
            </li>
            @endif
            <li class="menu-list">
                <a href=""><i class="fa fa-female "></i>
                    <span>{{ trans('admin/sidebar-left.profiles') }}</span></a>
                <ul class="child-list">

                    <li><a href="{{ url(App::getLocale().'/admin/girls') }}"> {{ trans('admin/sidebar-left.allProfiles') }}</a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/girl/new') }}"> {{ trans('admin/sidebar-left.addProfile') }}</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#check"> {{ trans('admin/sidebar-left.checkProfile') }}</a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/girls/active') }}">{{ trans('admin/sidebar-left.active') }}</a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/girls/deactive') }}"> {{ trans('admin/sidebar-left.deactive') }}</a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/girls/dismiss') }}"> {{ trans('admin/sidebar-left.dismiss') }}</a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/girls/deleted') }}"> {{ trans('admin/sidebar-left.deleted') }}</a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/girls/moderation') }}"> {{ trans('admin/sidebar-left.moderation') }}</a></li>
                </ul>
            </li>
            @if( Auth::User()->hasRole('Partner'))
                <li>
                    <a href="{{ url(App::getLocale().'/admin/finance') }}"> <i class="fa fa-money"></i>{{ trans('admin/sidebar-left.financeReports') }}</a>
                </li>
                <li>
                    <a href="{{ url(App::getLocale().'/admin/sender') }}"><i class="fa fa-envelope-o"></i> {{ trans('admin/sidebar-left.sender') }}</a>
                </li>
                <li>
                    <a href="{{ url(App::getLocale().'/admin/gifts') }}"><i class="fa fa-gift"></i>{{ trans('admin/sidebar-left.gifts') }}</a>
                </li>
                <li>
                    <a href="{{ url(App::getLocale().'/admin/messages_from_man') }}"> <i class="fa fa-envelope-o"></i>{{ trans('admin/sidebar-left.messagesFromMan') }}</a>
                </li>
            @endif
            <li>
                <a href="{{ url(App::getLocale().'/admin/support') }}"><i class="fa fa-life-ring"></i> {{ trans('admin/sidebar-left.support') }}</a>
            </li>
            @if( Auth::User()->hasRole('Owner') )
            <li>
                <h3 class="navigation-title">{{ trans('admin/sidebar-left.content') }}</h3>
            </li>
            <li class="menu-list"><a href="javascript:;"><i class="fa fa-paper-plane"></i>
                    <span>{{ trans('admin/sidebar-left.blog') }}</span></a>
                <ul class="child-list">
                    <li><a href="{{ url(App::getLocale().'/admin/blog') }}">{{ trans('admin/sidebar-left.all') }}</a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/blog/new') }}">{{ trans('admin/sidebar-left.new') }}</a></li>
                </ul>
            </li>
            <li class="menu-list"><a href="javascript:;"><i class="fa fa-paper-plane"></i>
                    <span>{{ trans('admin/sidebar-left.pages') }}</span></a>
                <ul class="child-list">
                    <li><a href="{{ url(App::getLocale().'/admin/pages') }}">{{ trans('admin/sidebar-left.allPages') }}</a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/pages/add') }}">{{ trans('admin/sidebar-left.addPage') }}</a></li>
                </ul>
            </li>
            <li class=""><a href="{{ url(App::getLocale().'/admin/horoscope') }}"><i class="fa fa-codiepie"></i>
                    <span>{{ trans('admin/sidebar-left.horoscope') }}</span></a>
            </li>
            @endif()
            <li class=""><a href="{{ url(App::getLocale().'/admin/profile/') }}"><i class="fa fa-user-md"></i>
                    <span>{{ trans('admin/sidebar-left.profile') }}</span></a>
            </li>
        </ul>
        <!--sidebar nav end-->
    </div>
</div>
<!-- sidebar left end-->