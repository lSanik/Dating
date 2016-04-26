@extends('admin.layout')

@section('scripts')

@stop
@section('content')
<div class="row">
    <div class="col-md-3">
        <section class="panel">
            <header class="panel-heading">
                Анкеты девушек
                    <span class="tools pull-right">
                    <a class="t-collapse fa fa-chevron-down" href="javascript:;"></a>
                </span>
            </header>
            <div class="panel-body" style="display: block;">
                <p ><a href="{{ url(App::getLocale().'/admin/girls') }}" class="text-primary"><strong>Общее:</strong><span class="label label-primary pull-right">{{sizeof($girls)}}</span></a></p>
                <p ><a href="{{ url(App::getLocale().'/admin/girls/active') }}" class="text-success"><strong>Активные:</strong></strong><span class="label label-success pull-right">{{sizeof($active)}}</span></a></p>
                <p ><a href="{{ url(App::getLocale().'/admin/girls/moderation') }}" class="text-info"><strong>На модерации:</strong><span class="label label-info pull-right">{{sizeof($moderation)}}</span></a></p>
                <p ><a href="{{ url(App::getLocale().'/admin/girls/dismiss') }}" class="text-warning"><strong>Отклоненные:</strong><span class="label label-warning pull-right">{{sizeof($dismiss)}}</span></a></p>
                <p ><a href="{{ url(App::getLocale().'/admin/girls/deactive') }}" class="text-warning"><strong>Приостановленные:</strong><span class="label label-warning pull-right">{{sizeof($deactive)}}</span></a></p>
                <p ><a href="{{ url(App::getLocale().'/admin/girls/deleted') }}" class="text-danger"><strong>Удаленные:</strong><span class="label label-danger pull-right">{{sizeof($deleted)}}</span></a></p>

            </div>
        </section>
    </div>
    <div class="col-md-3">
        <section class="panel">
            <header class="panel-heading">
                Пользователи
                    <span class="tools pull-right">
                    <a class="t-collapse fa fa-chevron-down" href="javascript:;"></a>
                </span>
            </header>
            <div class="panel-body" style="display: block;">
                <p class="text-success"><strong>Мужчины:</strong></strong><span class="label label-success pull-right">{{sizeof($man)}}</span> </p>
                <hr/>
                <p><a href="{{ url(App::getLocale().'/admin/partners') }}" class="text-primary"><strong>Партнеры:</strong><span class="label label-primary pull-right">{{sizeof($partner)}}</span></a> </p>
                <p><a href="{{ url(App::getLocale().'/admin/moderators') }}" class="text-info"><strong>Модераторы:</strong></strong><span class="label label-info pull-right">{{sizeof($moderator)}}</span></a></p>
            </div>
        </section>
    </div>
    <div class="col-md-6">

    </div>
</div>
@stop
@section('scripts')

@stop