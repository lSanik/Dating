@extends('admin.layout')

@section('scripts')

@stop
@section('content')
<div class="row">
    <div class="col-md-3">
        <section class="panel">
            <header class="panel-heading">
                {{ trans('admin/control.profilesOfGirls') }}
                    <span class="tools pull-right">
                    <a class="t-collapse fa fa-chevron-down" href="javascript:;"></a>
                </span>
            </header>
            <div class="panel-body" style="display: block;">
                <p ><a href="{{ url(App::getLocale().'/admin/girls') }}" class="text-primary"><strong>{{ trans('admin/control.allProfiles') }}:</strong><span class="label label-primary pull-right">{{sizeof($girls)}}</span></a></p>
                <p ><a href="{{ url(App::getLocale().'/admin/girls/active') }}" class="text-success"><strong>{{ trans('admin/control.active') }}:</strong></strong><span class="label label-success pull-right">{{sizeof($active)}}</span></a></p>
                <p ><a href="{{ url(App::getLocale().'/admin/girls/moderation') }}" class="text-info"><strong>{{ trans('admin/control.moderation') }}:</strong><span class="label label-info pull-right">{{sizeof($moderation)}}</span></a></p>
                <p ><a href="{{ url(App::getLocale().'/admin/girls/dismiss') }}" class="text-warning"><strong>{{ trans('admin/control.dismiss') }}:</strong><span class="label label-warning pull-right">{{sizeof($dismiss)}}</span></a></p>
                <p ><a href="{{ url(App::getLocale().'/admin/girls/deactive') }}" class="text-warning"><strong>{{ trans('admin/control.deactive') }}:</strong><span class="label label-warning pull-right">{{sizeof($deactive)}}</span></a></p>
                <p ><a href="{{ url(App::getLocale().'/admin/girls/deleted') }}" class="text-danger"><strong>{{ trans('admin/control.deleted') }}:</strong><span class="label label-danger pull-right">{{sizeof($deleted)}}</span></a></p>

            </div>
        </section>
    </div>
    <div class="col-md-3">
        <section class="panel">
            <header class="panel-heading">
                {{ trans('admin/control.users') }}
                    <span class="tools pull-right">
                    <a class="t-collapse fa fa-chevron-down" href="javascript:;"></a>
                </span>
            </header>
            <div class="panel-body" style="display: block;">
                <p class="text-success"><strong>{{ trans('admin/control.mans') }}:</strong></strong><span class="label label-success pull-right">{{sizeof($man)}}</span> </p>
                <hr/>
                <p><a href="{{ url(App::getLocale().'/admin/partners') }}" class="text-primary"><strong>{{ trans('admin/control.partners') }}:</strong><span class="label label-primary pull-right">{{sizeof($partner)}}</span></a> </p>
                <p><a href="{{ url(App::getLocale().'/admin/moderators') }}" class="text-info"><strong>{{ trans('admin/control.moderators') }}:</strong></strong><span class="label label-info pull-right">{{sizeof($moderator)}}</span></a></p>
            </div>
        </section>
    </div>
    <div class="col-md-6">

    </div>
</div>
@stop
@section('scripts')

@stop