@extends('admin.layout')

@section('styles')

@stop
@section('content')
        <!--body wrapper start-->
<div class="wrapper no-pad" >

    <!--mail inbox start-->
    <div class="mail-box">
        <aside class="sm-side">
            <div class="m-title">
                <h3>Inbox</h3>
                <span>14 unread mail</span>
            </div>
            <div class="inbox-body">
                <a class="btn btn-compose" href="inbox-compose.html">
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

            <div class="inbox-body">
                @foreach($tickets as $t)

                <div class="heading-inbox row">

                    <div class="col-md-12">
                        <h4> {{ $t->subject }}  [Тематика: {{ trans('support.'.$t->name) }}]  </h4>
                    </div>

                </div>
                <div class="sender-info">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="pull-left">
                                <img alt="" src="img/img2.jpg">
                            </div>
                            <div class="s-info">
                                <strong>{{ $t->first_name }} {{ $t->last_name }}</strong>
                                <span></span>
                                to
                                <span>me</span>

                            </div>

                        </div>
                        <div class="col-md-6 col-xs-12">

                            <p class="date pull-right"> {{ $t->updated_at }} </p>

                        </div>
                    </div>
                </div>
                <div class="view-mail">
                   {!! $t->message !!}
                </div>
                @if(!empty($reply))
                    @foreach($reply as $r)
                        <div class="inbox-body">

                            <div class="sender-info">Ответ от: {{ $r->first_name }} {{ $r->last_name }}</div>
                            <div class="view-mail">
                                {{ $r->reply }}
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="reply-mail m-b-20">
                    {!! Form::open(['url' => '#', 'method' => 'POST']) !!}
                    {!! Form::textarea('reply', 'Reply', ['class' => 'form-control', 'cols' => '30', 'rows' => '5']) !!}
                </div>
                <div class="compose-btn pull-right">
                    {!! Form::submit(trans('buttons.send'), ['class' => 'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}
            @endforeach
            </div>
        </aside>
    </div>
    <!--mail inbox end-->

</div>
<!--body wrapper end-->

@stop
@section('scripts')

@stop