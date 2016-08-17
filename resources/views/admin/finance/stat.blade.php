@extends('admin.layout')

@section('content')

    <div class="doh">
        <section class="panel panel-default col-md-4">
            <header class="panel-heading">
                {{trans('stat.INCOME-FOR-THE-PAST-MONTH')}}
            </header>
            <div class="panel-body">
                <div class="all">
                    {{trans('stat.total-amount')}}:<span class="bold pull-right"> <b>$ {{ $l_amount * $rate->price }}</b></span>
                </div>
                @if( Auth::user()->hasRole('Owner') )
                <hr/>
                    <div class="partners">
                        <header>{{trans('stat.partners')}}</header>
                        <table class="table table-hovered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('stat.partner') }}</th>
                                <th>{{ trans('stat.cost') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($prevMonth as $p)
                                    <tr>
                                        <td>{{ $p->uid }}</td>
                                        <td>{{ $p->first_name }} {{ $p->last_name }}</td>
                                        <td>{{ ($p->expense * $rate->price) / 2  }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </section>

        <section class="panel panel-default col-md-4 col-md-offset-1">
            <header class="panel-heading">
                {{trans('stat.profit-for-the-current-month')}}
            </header>
            <div class="panel-body">
                <div class="all">
                    {{trans('stat.total-amount')}}:<span class="bold pull-right"> <b>$ {{ $amount * $rate->price }}</b></span>
                </div>
                @if( Auth::user()->hasRole('Owner') )
                    <hr/>
                    <div class="partners">
                        <header>{{trans('stat.partners')}}</header>
                        <table class="table table-hovered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('stat.partner') }}</th>
                                <th>{{ trans('stat.cost') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($month as $m)
                                    <tr>
                                        <td>{{ $m->uid }}</td>
                                        <td>{{ $m->first_name }} {{ $m->last_name }}</td>
                                        <td>{{ ($m->expense * $rate->price) / 2  }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </section>

        <section class="panel panel-default col-md-4">
            <header class="panel-heading">
                Выплаты партнерам
            </header>
            <div class="panel-body">
                <div class="all">
                    Общая сумма: <span class="bold pull-right"> <b>$ {{ $amount * $rate->price }}</b></span>
                </div>
                @if( Auth::user()->hasRole('Owner') )
                    <hr/>
                    <div class="partners">
                        <header>По партнерам</header>
                        <table class="table table-hovered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('stat.partner') }}</th>
                                <th>{{ trans('stat.cost') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($month as $m)
                                <tr>
                                    <td>{{ $m->uid }}</td>
                                    <td>{{ $m->first_name }} {{ $m->last_name }}</td>
                                    <td>{{ ($m->expense * $rate->price) / 2  }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </section>
    </div>

    <section class="panel panel-default col-md-12">
        <header class="panel-heading">
            {{trans('stat.transfer')}}
        </header>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ trans('stat.user') }}</th>
                    <th>{{ trans('stat.girl') }}</th>
                    <th>{{ trans('stat.partner') }}</th>
                    <th>{{ trans('stat.cost') }} $</th>
                    <th>{{ trans('stat.type') }}</th>
                    <th>{{ trans('stat.date') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($stat as $s)
                    <tr>
                        <td>{{ $s->eid }}</td>
                        <td>{{ $s->user_id }}: {{ $s->first_name }} {{ $s->last_name }}</td>
                        <td>{{ $s->girl_id }}: </td>
                        <td>{{ $s->partner_id }}</td>
                        <td>{{ ($s->expense * $rate->price) / 2 }}</td>
                        <td>{{ trans('stat.'.$s->type) }}</td>
                        <td>{{ $s->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">{{ $stat->links() }}</div>
        </div>
    </section>

@stop