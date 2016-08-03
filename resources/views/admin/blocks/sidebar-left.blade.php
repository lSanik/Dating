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
                    <span>Управление</span>
                </a>
            </li>
            @if( Auth::User()->hasRole('Owner') )
            <li class="menu-list">
                <a href="#"><i class="fa fa fa-money"></i>
                    <span>Финансы</span></a>
                <ul class="child-list">
                    <li><a href="{{ url(App::getLocale().'/admin/finance/stat') }}"> Статистика </a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/finance/control') }}"> Управление  </a></li>
                </ul>
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
                    <li><a href="{{ url(App::getLocale().'/admin/partners/') }}"> Все партнеры </a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/partner/new') }}"> Добавить партнера </a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/partner/stat') }}"> Статистика по партнерам </a></li>
                </ul>
            </li>
            <li class="menu-list">
                <a href=""><i class="fa fa-user"></i>
                    <span>Модераторы</span></a>
                <ul class="child-list">
                    <li><a href="{{ url(App::getLocale().'/admin/moderators') }}"> Все модераторы </a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/moderator/new') }}"> Добавить модератора </a></li>
                </ul>
            </li>
            @endif
            <li class="menu-list">
                <a href=""><i class="fa fa-female "></i>
                    <span>Анкеты</span></a>
                <ul class="child-list">

                    <li><a href="{{ url(App::getLocale().'/admin/girls') }}"> Все анкеты </a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/girl/new') }}"> Добавить анкету </a></li>
                    <li><a href="#" data-toggle="modal" data-target="#check"> Проверить наличие анкеты </a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/girls/active') }}"> Активные </a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/girls/deactive') }}"> Приостановленные </a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/girls/dismiss') }}"> Отклоненные </a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/girls/deleted') }}"> Удаленные </a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/girls/moderation') }}"> На модерации </a></li>
                </ul>
            </li>
            @if( Auth::User()->hasRole('Partner'))
                <li>
                    <a href="{{ url(App::getLocale().'/admin/finance') }}"> <i class="fa fa-money"></i>Финансовые отчеты</a>
                </li>
                <li>
                    <a href="{{ url(App::getLocale().'/admin/sender') }}"><i class="fa fa-envelope-o"></i> Рассылка </a>
                </li>
                <li>
                    <a href="{{ url(App::getLocale().'/admin/gifts') }}"><i class="fa fa-gift"></i> Подарки </a>
                </li>
                <li>
                    <a href="{{ url(App::getLocale().'/admin/messages_from_man') }}"> <i class="fa fa-envelope-o"></i>Сообщения от мужчин </a>
                </li>
            @endif
            <li>
                <a href="{{ url(App::getLocale().'/admin/support') }}"><i class="fa fa-life-ring"></i> Обратная связь </a>
            </li>
            @if( Auth::User()->hasRole('Owner') )
            <li>
                <h3 class="navigation-title">Контент</h3>
            </li>
            <li class="menu-list"><a href="javascript:;"><i class="fa fa-paper-plane"></i>
                    <span>Блог </span></a>
                <ul class="child-list">
                    <li><a href="{{ url(App::getLocale().'/admin/blog') }}">Все записи</a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/blog/new') }}">Создать запись</a></li>
                </ul>
            </li>
            <li class="menu-list"><a href="javascript:;"><i class="fa fa-paper-plane"></i>
                    <span>Страницы </span></a>
                <ul class="child-list">
                    <li><a href="{{ url(App::getLocale().'/admin/pages') }}">Все страницы</a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/pages/add') }}">Добавить страницу</a></li>
                </ul>
            </li>
            <li class=""><a href="{{ url(App::getLocale().'/admin/horoscope') }}"><i class="fa fa-codiepie"></i>
                    <span>Гороскопы </span></a>
            </li>
            @endif()
            <li class=""><a href="{{ url(App::getLocale().'/admin/profile/') }}"><i class="fa fa-user-md"></i>
                    <span>Профиль </span></a>
            </li>
        </ul>
        <!--sidebar nav end-->
    </div>
</div>
<!-- sidebar left end-->