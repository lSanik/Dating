 <!-- header section start-->
<div class="header-section">

    <!--logo and logo icon start-->
    <div class="logo dark-logo-bg hidden-xs hidden-sm">
        <a href="{{ url('/admin/dashboard') }}">
            <img width="50px" src="data:image/png;base64,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" alt="">
            <!--<i class="fa fa-maxcdn"></i>-->
            <span class="brand-name">Dating</span>
        </a>
    </div>

    <div class="icon-logo dark-logo-bg hidden-xs hidden-sm">
        <a href="{{ url('/admin/dashboard') }}">
            <!-- img src="img/logo-icon.png" alt="" -->
            <!--<i class="fa fa-maxcdn"></i>-->
        </a>
    </div>
    <!--logo and logo icon end-->


    <!--mega menu end-->
    <div class="notification-wrap">
        <!--left notification start-->
        <div class="left-notification">
            <ul class="notification-menu">

                <!--mail info start-->
                <li class="d-none">
                    <a href="javascript:;" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-success">

                            @if( $unread_ticket_count  )
                                {{ $unread_ticket_count }}
                            @else
                                0
                            @endif

                        </span>
                    </a>

                    <div class="dropdown-menu dropdown-title">
                        <div class="title-row">
                            <h5 class="title purple">
                                You have
                                @if( $unread_ticket_count )
                                    {{ $unread_ticket_count }}
                                @else
                                    0
                                @endif
                                Unread Messages
                            </h5>
                            <a href="/{{ App::getLocale() }}/admin/support" class="btn-success btn-view-all">View all</a>
                        </div>
                        <div class="notification-list mail-list">

                            @if($new_ticket_messages)
                                @foreach($new_ticket_messages as $mess)
                                    <a href="/{{ App::getLocale() }}/admin/support/show/{{ $mess->id }}" class="single-mail">
                                        <!-- Refactor -->
                                        @php
                                            $x = rand(0,5);
                                            $classes = [
                                                'bg-info','bg-success','bg-warning',
                                                'bg-primary','bg-danger','bg-dark'
                                            ];
                                        @endphp
                                        <span class="icon {{ $classes[$x] }}">
                                            {{ $mess->first_name{0} }}
                                        </span>
                                        <strong>{{ $mess->first_name }} {{ $mess->last_name }}</strong>
                                        <small>{{ $mess->subject }}</small>
                                        <p>
                                            <small>Тематика: {{ trans('support.'.$mess->name) }}</small>
                                        </p>
                                    </a>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </li>
                <!--mail info end-->



                <!--notification info start-->
                <li>
                    <a href="javascript:;" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="badge bg-warning">4</span>
                    </a>

                    <div class="dropdown-menu dropdown-title ">

                        <div class="title-row">
                            <h5 class="title yellow">
                                You have 4 New Notification
                            </h5>
                            <a href="javascript:;" class="btn-warning btn-view-all">View all</a>
                        </div>
                        <div class="notification-list-scroll sidebar">
                            <div class="notification-list mail-list not-list">
                                <a href="javascript:;" class="single-mail">
                                    <span class="icon bg-primary">
                                        <i class="fa fa-envelope-o"></i>
                                    </span>
                                    <strong>New User Registration</strong>

                                    <p>
                                        <small>Just Now</small>
                                    </p>
                                    <span class="un-read tooltips" data-original-title="Mark as Read" data-toggle="tooltip" data-placement="left">
                                        <i class="fa fa-circle"></i>
                                    </span>
                                </a>
                                <a href="javascript:;" class="single-mail">
                                    <span class="icon bg-success">
                                        <i class="fa fa-comments-o"></i>
                                    </span>
                                    <strong> Private message Send</strong>

                                    <p>
                                        <small>30 Mins Ago</small>
                                    </p>
                                    <span class="un-read tooltips" data-original-title="Mark as Read" data-toggle="tooltip" data-placement="left">
                                        <i class="fa fa-circle"></i>
                                    </span>
                                </a>
                                <a href="javascript:;" class="single-mail">
                                    <span class="icon bg-warning">
                                        <i class="fa fa-warning"></i>
                                    </span> Application Error
                                    <p>
                                        <small> 2 Days Ago</small>
                                    </p>
                                    <span class="read tooltips" data-original-title="Mark as Unread" data-toggle="tooltip" data-placement="left">
                                        <i class="fa fa-circle-o"></i>
                                    </span>
                                </a>
                                <a href="javascript:;" class="single-mail">
                                    <span class="icon bg-dark">
                                       <i class="fa fa-database"></i>
                                    </span> Database Overloaded 24%
                                    <p>
                                        <small>1 Week Ago</small>
                                    </p>
                                    <span class="read tooltips" data-original-title="Mark as Unread" data-toggle="tooltip" data-placement="left">
                                        <i class="fa fa-circle-o"></i>
                                    </span>
                                </a>
                                <a href="javascript:;" class="single-mail">
                                    <span class="icon bg-danger">
                                        <i class="fa fa-warning"></i>
                                    </span>
                                    <strong>Server Failed Notification</strong>

                                    <p>
                                        <small>10 Days Ago</small>
                                    </p>
                                    <span class="un-read tooltips" data-original-title="Mark as Read" data-toggle="tooltip" data-placement="left">
                                        <i class="fa fa-circle"></i>
                                    </span>
                                </a>

                            </div>
                        </div>
                    </div>
                </li>
                <!--notification info end-->
            </ul>
        </div>
        <!--left notification end-->


        <!--right notification start-->
        <div class="right-notification">
            <ul class="notification-menu">
                <li class="dropdown">
                    <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false">
                        <img src="{{ url('/assets/img/flags/'.App::getLocale().'.png') }}" alt="{{App::getLocale()}}"><span>{{ trans( 'langs.'.App::getLocale() ) }}</span>
                        <b class=" fa fa-angle-down"></b>
                    </a>
                    <ul role="menu" class="dropdown-menu language-switch">
                        @foreach( Config::get('app.locales') as $locale )
                            @if( $locale != App::getLocale() )
                                <li><a tabindex="-1" href="/{{ str_replace("//","/",$locale.'/'.str_replace(Config::get('app.locales'),'', Request::path())) }}"><span> {{ trans('langs.'.$locale) }} </span><img src="{{ url('/assets/img/flags/'.$locale.'.png') }}" alt="{{$locale}}"></a></li>
                            @endif
                        @endforeach

                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ url('/uploads/admins/'.Auth::user()->avatar )}}" alt="">
                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu purple pull-right">
                        <li><a href="{{ url('/admin/profile') }}">  Profile</a></li>
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </li>


            </ul>
        </div>
        <!--right notification end-->
    </div>

</div>
<!-- header section end-->