@extends('admin.layout')

@section('styles')

@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading head-border">
                    {{trans('/admin/blog.allRecords')}}
                    <a href="{{ url('/admin/blog/new') }}" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> {{trans('/admin/blog.add')}}</a>
                </header>
                <table class="table table-striped custom-table table-hover">
                    <thead>
                        <tr>
                            <th> <i class="fa fa-bookmark-o"></i> {{trans('/admin/blog.header')}} </th>
                            <th> <i class="fa fa-file-text"></i> {{trans('/admin/blog.start')}}</th>
                            <th> <i class="fa fa-language"></i> {{trans('/admin/blog.language')}}</th>
                            <th class="hidden-xs"><i class="fa fa-cogs"></i> {{trans('/admin/blog.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <?php
                            $post_title=null;
                            $post_body=null;
                            $post_lang_icon='<div class="lang_icons">';
                            ?>
                            @foreach(\Config::get('app.locales') as $locals)
                                <?php
                                $flag_empty=false;
                                ?>
                                @foreach($translation as $trans)
                                    @if ($post->id == $trans->post_id)
                                        @if($trans["locale"] == $locals)
                                            @if($trans->title!=null)
                                                <?php
                                                $flag_empty=true;
                                                $post_title=$trans->title;
                                                $post_body=$trans->body;
                                                $post_lang_icon.='<img style="padding: 0px 5px 0px 0px; display: inline-block;" src="/assets/img/flags/'.$trans->locale.'.png">';
                                                ?>
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                                @if($flag_empty==false)
                                    <?php
                                    $post_lang_icon.='<img style="padding: 0px 5px 0px 0px; display: inline-block;opacity:0.3;" src="/assets/img/flags/'.$locals.'.png">';
                                    ?>
                                @endif
                            @endforeach
                        <?php $post_lang_icon.="</div>" ?>
                        <tr>
                            <td>{{ str_limit($post_title, 64) }}</td>
                            <td>{{ str_limit(strip_tags($post_body), 128) }}</td>                              </td>
                            <td>{!! $post_lang_icon !!}</td>
                            <td class="hidden-xs">
                                <a href="{{ url('/blog/'. $post->id ) }}" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-eye"></i>{{trans('/admin/blog.review')}}</a>
                                <a href="{{ url('/admin/blog/edit/'.$post->id ) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>{{trans('/admin/blog.edit')}}</a>
                                <a href="{{ url('/admin/blog/drop/'.$post->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i>{{trans('/admin/blog.delete')}}</a>
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