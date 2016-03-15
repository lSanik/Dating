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
                    <li><a href="{{ url(App::getLocale().'#') }}"> Статистика </a></li>
                    <li><a href="{{ url(App::getLocale().'#') }}"> Управление  </a></li>
                </ul>
            </li>
            <li class="">
                <a href="{{ url(App::getLocale().'#') }}">
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
                    <li><a href="{{ url(App::getLocale().'/admin/partners/') }}"> Все партнеры </a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/partner/new') }}"> Добавить партнера </a></li>
                    <li><a href="{{ url(App::getLocale().'#') }}"> Статистика по партнерам </a></li>
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
            @if( Auth::User()->hasRole('Partner') )
            <li class="menu-list">
                <a href=""><i class="fa fa-female "></i>
                    <span>Анкеты</span></a>
                <ul class="child-list">
                    <li><a href="{{ url(App::getLocale().'/admin/girls') }}"> Все анкеты </a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/girl/new') }}"> Добавить анкету </a></li>
                    <li><a href="#" data-toggle="modal" data-target="#check"> Проверить наличие анкеты </a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/girls/active') }}"> Активные </a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/girls/wait') }}"> Приостановленные </a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/girls/no') }}"> Отклоненные </a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/girls/deleted') }}"> Удаленные </a></li>
                    <li><a href="{{ url(App::getLocale().'/admin/girls/moderation') }}"> На модерации </a></li>
                </ul>
            </li>
                <li>
                    <a href="{{ url(App::getLocale().'/admin/finance') }}"> <i class="fa fa-money"></i>Финансовые отчеты</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-envelope-o"></i> Рассылка </a>
                </li>
                <li>
                    <a href="{{ url(App::getLocale().'/admin/gifts') }}"><i class="fa fa-gift"></i> Подарки </a>
                </li>
                <li>
                    <a href="{{ url(App::getLocale().'/admin/support') }}"><i class="fa fa-life-ring"></i> Обратная связь </a>
                </li>
                <li>
                    <a href="{{ url(App::getLocale().'/admin/messages_from_man') }}"> Сообщения от мужчин </a>
                </li>
            @endif
            <li>
                <h3 class="navigation-title">Сообщения (поддержка)</h3>
            </li>
            <li class="menu-list"><a href="javascript:;"><i class="fa fa-envelope-o"></i> <span>Сообщения<span class="label noti-arrow bg-danger pull-right">4 Unread</span> </span></a>
                <ul class="child-list">
                    <li><a href="{{ url(App::getLocale().'#') }}">Все сообщения</a></li>
                    <li><a href="{{ url(App::getLocale().'#') }}">Создать сообщение</a></li>
                </ul>
            </li>
            @if( Auth::User()->hasRole('Owner') )
                <li class="menu-list"><a href="javascript:;"><i class="fa fa-envelope-o"></i> <span>От Клиентов<span class="label noti-arrow bg-danger pull-right">4 Unread</span> </span></a>
                    <ul class="child-list">
                        <li><a href="{{ url(App::getLocale().'/admin/messages/') }}">Все сообщения</a></li>
                        <li><a href="{{ url(App::getLocale().'/admin/message/new') }}">Создать сообщение</a></li>
                    </ul>
                </li>
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
                    <li><a href="{{ url(App::getLocale().'/admin/page/new') }}">Добавить страницу</a></li>
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