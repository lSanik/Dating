@extends('admin.layout')

@section('content')

    <section class="panel panel-default">
        <header class="panel-heading">{{ trans("pages.pages") }}
            <div class="pull-right">
                <a href="{{ url(App::getLocale().'/admin/pages/add')}}" calss="btn btn-success"><i class="fa fa-plus"></i>{{ trans('pages.add') }}</a>
            </div>
        </header>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ trans('pages.title') }}</th>
                        <th>{{ trans('pages.slug') }}</th>
                        <th>{{ trans('pages.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pages as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->title }}</td>
                            <td>{{ $p->slug }}</td>
                            <td class="text-center">
                                <a href="{{ url(App::getLocale().'/admin/pages/edit/'.$p->id) }}" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="{{ url(App::getLocale().'/admin/pages/drop/'.$p->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@stop