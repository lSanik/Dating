@extends('admin.layout')

@section('content')
    <section class="panel">
        <header class="panel-heading">{{ trans('horoscope.horoscope') }}
            <div class="pull-right">
                <a href="/admin/horoscope/add"><i class="fa fa-plus"></i>ADD</a></div>
        </header>
        <div class="panel-body">
            <table class="table table-hovered">
                <thead>
                    <tr>
                        <th>{{ trans('admin/horoscope.from') }}</th>
                        <th>{{ trans('horoscope.to') }}</th>
                        <th>{{ trans('horoscope.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($compare as $c)
                    <tr>
                        <td>{{ trans('horoscope.'.$horoscope[$c->primary]) }}</td>
                        <td>{{ trans('horoscope.'.$horoscope[$c->secondary]) }}</td>
                        <td>
                            <a href="/admin/horoscope/edit/{{ $c->id }}" class="btn btn-primary">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@stop