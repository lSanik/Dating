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
                            <th> <i class="fa fa-language"></i> Язык </th>
                            <th class="hidden-xs"><i class="fa fa-cogs"></i> Действие </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $post_title=null;
                        $post_lang=null;
                        $post_lang_icon='<div class="lang_icons">';
                    ?>
                    @foreach($posts as $post)
                            @foreach($translation as $tr )
                                @if ($post->id == $tr->post_id)
                                    @if($tr->title!=null)
                                    <?php
                                        $post_lang_icon.='<img style="padding: 0px 5px 0px 0px; display: inline-block;" src="/assets/img/flags/'.$tr->locale.'.png">';
                                    ?>
                                    @else
                                        <?php
                                        $post_lang_icon.='<img style="padding: 0px 5px 0px 0px; display: inline-block;opacity:0.3;" src="/assets/img/flags/'.$tr->locale.'.png">';
                                        ?>
                                    @endif
                                @endif
                            @endforeach
                        <?php $post_lang_icon.="</div>" ?>
                            <tr>
                                <td>{{ str_limit($post->title, 64) }}</td>
                                <td>{!! str_limit($post->body, 128) !!}</td>
                                <td>{!! $post_lang_icon !!}

                                </td>
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