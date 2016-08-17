@extends('admin.layout')

@section('content')
    <section class="panel">
        <header class="panel-heading">{{ trans('/admin/horoscope.horoscope') }}
            <div class="pull-right">
                <a href="{{ url(App::getLocale().'/admin/horoscope/add')}}"><i class="fa fa-plus"></i>ADD</a></div>
        </header>
        <div class="panel-body">
            <table class="table table-hovered">
                <thead>
                    <tr>
                        <th>{{ trans('/admin/horoscope.from') }}</th>
                        <th>{{ trans('/admin/horoscope.to') }}</th>
                        <th>{{ trans('/admin/horoscope.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($compare as $c)
                    <tr>
                        <td>{{ trans('/admin/horoscope.'.$horoscope[$c->primary]) }}</td>
                        <td>{{ trans('/admin/horoscope.'.$horoscope[$c->secondary]) }}</td>
                        <td>
                            <a href="{{ url(App::getLocale().'/admin/horoscope/edit/'. $c->id) }}" class="btn btn-primary">
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