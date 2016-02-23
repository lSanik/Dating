<!-- sidebar left start-->
<div class="sidebar-left">
    <!--responsive view logo start-->
    <div class="logo dark-logo-bg visible-xs-* visible-sm-*">
        <a href="{{ url('/admin/dashboard') }}">
            <img src="img/logo-icon.png" alt="">
            <!--<i class="fa fa-maxcdn"></i>-->
            <span class="brand-name">Dating</span>
        </a>
    </div>
    <!--responsive view logo end-->

    <div class="sidebar-left-info">
        <!-- visible small devices start-->
        <div class=" search-field">  </div>
        <!-- visible small devices end-->

        <!--sidebar nav start-->
        <ul class="nav nav-pills nav-stacked side-navigation">
            <li class="active">
                <a href="{{ url('/admin/dashboard') }}">
                    <i class="fa fa-home"></i>
                    <span>Управление</span>
                </a>
            </li>
            @if( Auth::User()->hasRole('Owner') )
            <li class="menu-list">
                <a href=""><i class="fa fa fa-money"></i>
                    <span>Финансы</span></a>
                <ul class="child-list">
                    <li><a href="{{ url('#') }}"> Статистика </a></li>
                    <li><a href="{{ url('#') }}"> Управление  </a></li>
                </ul>
            </li>
            <li class="">
                <a href="{{ url('#') }}">
                    <i class="fa fa-home"></i>
                    <span>Статистика</span>
                </a>
            </li>
            @endif
            <li class="">
                <h3 class="navigation-title">Профили</h3>
            </li>
            @if( Auth::User()->hasRole('Owner') )
            <li class="menu-list">
                <a href=""><i class="fa fa-user-secret"></i>
                    <span>Партнеры</span></a>
                <ul class="child-list">
                    <li><a href="{{ url('#') }}"> Все партнеры </a></li>
                    <li><a href="{{ url('#') }}"> Добавить партнера </a></li>
                    <li><a href="{{ url('#') }}"> Статистика по партнерам </a></li>
                </ul>
            </li>
            <li class="menu-list">
                <a href=""><i class="fa fa-user"></i>
                    <span>Модераторы</span></a>
                <ul class="child-list">
                    <li><a href="{{ url('#') }}"> Все модераторы </a></li>
                    <li><a href="{{ url('#') }}"> Добавить модератора </a></li>
                </ul>
            </li>
            @endif
            @if( Auth::User()->hasRole(['Partner', 'Moder']) )
            <li class="menu-list">
                <a href=""><i class="fa fa-female "></i>
                    <span>Анкеты</span></a>
                <ul class="child-list">
                    <li><a href="{{ url('#') }}"> Все анкеты </a></li>
                    <li><a href="{{ url('#') }}"> Добавить анкету </a></li>
                    <li><a href="{{ url('#') }}"> Создать рассылку </a></li>
                    <li><a href="{{ url('#') }}"> Статистика по анкетам </a></li>
                </ul>
            </li>
            @endif
            <li>
                <h3 class="navigation-title">Сообщения (поддержка)</h3>
            </li>
            <li class="menu-list"><a href="javascript:;"><i class="fa fa-envelope-o"></i> <span>От Партнеров<span class="label noti-arrow bg-danger pull-right">4 Unread</span> </span></a>
                <ul class="child-list">
                    <li><a href="{{ url('#') }}">Все сообщения</a></li>
                    <li><a href="{{ url('#') }}">Создать сообщение</a></li>
                </ul>
            </li>
            <li class="menu-list"><a href="javascript:;"><i class="fa fa-envelope-o"></i> <span>От Клиентов<span class="label noti-arrow bg-danger pull-right">4 Unread</span> </span></a>
                <ul class="child-list">
                    <li><a href="{{ url('#') }}">Все сообщения</a></li>
                    <li><a href="{{ url('#') }}">Создать сообщение</a></li>
                </ul>
            </li>
            @if( Auth::User()->hasRole('Owner') )
            <li>
                <h3 class="navigation-title">Контент</h3>
            </li>
            <li class="menu-list"><a href="javascript:;"><i class="fa fa-paper-plane"></i>
                    <span>Блог </span></a>
                <ul class="child-list">
                    <li><a href="{{ url('/admin/blog') }}">Все записи</a></li>
                    <li><a href="{{ url('/admin/blog/new') }}">Создать запись</a></li>
                </ul>
            </li>
            <li class="menu-list"><a href="javascript:;"><i class="fa fa-paper-plane"></i>
                    <span>Страницы </span></a>
                <ul class="child-list">
                    <li><a href="{{ url('#') }}">Все страницы</a></li>
                    <li><a href="{{ url('#') }}">Добавить страницу</a></li>
                </ul>
            </li>
            <li class=""><a href="{{ url('#') }}"><i class="fa fa-codiepie"></i>
                    <span>Гороскопы </span></a>
            </li>
            @endif()
            <li class=""><a href="{{ url('#') }}"><i class="fa fa-user-md"></i>
                    <span>Профиль </span></a>
            </li>
        </ul>
        <!--sidebar nav end-->

        <!--sidebar widget start-->
        <div class="sidebar-widget">
            <h4>Server Status</h4>
            <ul class="list-group">
                <li>
                    <span class="label label-danger pull-right">33%</span>
                    <p>CPU Used</p>
                    <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-danger" style="width: 33%;">
                            <span class="sr-only">33%</span>
                        </div>
                    </div>
                </li>
                <li>
                    <span class="label label-warning pull-right">65%</span>
                    <p>Bandwidth</p>
                    <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-warning" style="width: 65%;">
                            <span class="sr-only">65%</span>
                        </div>
                    </div>
                </li>
                <li class="text-center"><a href="{{ url('#') }}" class="btn btn-success btn-sm ">Детально</a></li>
            </ul>
        </div>
        <!--sidebar widget end-->

    </div>
</div>
<!-- sidebar left end-->