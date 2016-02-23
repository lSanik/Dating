@extends('admin.layout')

@section('styles')

@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading head-border">
                    Все записи
                    <a href="{{ url('/admin/blog/new') }}" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Добавить </a>
                </header>
                <table class="table table-striped custom-table table-hover">
                    <thead>
                        <tr>
                            <th> <i class="fa fa-bookmark-o"></i>  Заголовок </th>
                            <th> <i class="fa fa-file-text"></i> Начало </th>
                            <th class="hidden-xs"><i class="fa fa-cogs"></i> Действие </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ str_limit($post->title, 64) }}</td>
                                <td>{!! str_limit($post->body, 128) !!}</td>
                                <td class="hidden-xs">
                                    <a href="{{ url('/blog/'. $post->id ) }}" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-eye"></i> Посмотреть</a>
                                    <a href="{{ url('/admin/blog/edit/'.$post->id ) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>Редактировать</a>
                                    <a href="{{ url('/admin/blog/drop/'.$post->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i>Удалить</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>
@stop

@section('scripts')

@stop