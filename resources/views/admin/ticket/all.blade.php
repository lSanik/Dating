@extends('admin.layout')

@section('styles')

@stop

@section('content')
        <!--mail inbox start-->
<div class="mail-box">
    <aside class="sm-side">
        <div class="m-title">
            <h3>Inbox</h3>
            <span>14 unread mail</span>
        </div>
        <div class="inbox-body">
            <a class="btn btn-compose" href="/{{ App::getLocale() }}/admin/support/new">
                Compose
            </a>
        </div>

        <ul class="inbox-nav inbox-divider">
            <li class="active">
                <a href="#"><i class="fa fa-inbox"></i> Все </a>
            </li>
            <li>
                <a href="#"><i class="fa fa-envelope"></i> Ответ получен <span class="label label-danger pull-right">2</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-trash"></i> Закрытые </a>
            </li>
        </ul>

    </aside>
    <aside class="lg-side" style="height: 1200px">

        <div class="inbox-body no-pad">

            <table class="table table-inbox table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>#</th>
                        <th>Название</th>
                        <th>Тематика</th>
                        <th>Тема</th>
                        <th></th>
                        <th>Дата</th>
                    </tr>

                </thead>
                <tbody>
                @foreach($tickets as $t)

                        <tr @if($t->status == 0) class="unread" @endif>
                        <td class="inbox-small-cells">
                            <label class="checkbox-custom check-success">
                                <input type="checkbox" value="{{ $t->id }}" id="c{{ $t->id }}"> <label for="c{{ $t->id }}"> </label>
                            </label>
                        </td>

                        <td>
                            <a href="#" class="avatar"> <!-- @todo UserAvatar -->
                                <img src="img/img1.jpg" alt=""/>
                            </a>
                        </td>

                        <td class="view-message">
                            <a href="/{{ App::getLocale() }}/admin/support/show/{{ $t->id }}"> {{ $t->first_name }} {{ $t->last_name }}(#ID: {{ $t->uid }}) </a>
                        </td>

                        <td class="view-message">{{ trans('support.'.$t->name) }}</td>
                        <td class="view-message">{{ $t->subject }}</td>
                        <td class="view-message"></td>
                        <td class="view-message  text-right">{{ $t->updated_at }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </aside>
</div>
<!--mail inbox end-->
@stop

@section('scripts')

@stop