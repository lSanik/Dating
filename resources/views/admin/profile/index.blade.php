@extends('admin.layout')

@section('styles')

@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading head-border">
                    Все пользователи
                    <a href="{{ url('/admin/profile/new') }}" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Добавить </a>
                </header>
                <table class="table table-striped custom-table table-hover">
                    <thead>
                    <tr>
                        <th> <i class="fa fa-bookmark-o"></i>  Имя </th>
                        <th> <i class="fa fa-file-text"></i> Фамилия </th>
                        <th> <i class="fa fa-envelope"></i> Email </th>
                        <th> <i class="fa fa-stack"></i> Роль </th>
                        <th class="hidden-xs"><i class="fa fa-cogs"></i> Действие </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->name }}</td>
                            <td class="hidden-xs">
                                <a href="{{ url('/admin/profile/'. $user->id ) }}" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-eye"></i></a>
                                <a href="{{ url('/admin/profile/edit/'.$user->id ) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                <a href="{{ url('/admin/profile/drop/'.$user->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </section>
            <div class="panel-footer text-center">
                {{ $users->render() }}
            </div>
        </div>
    </div>
@stop

@section('scripts')

@stop