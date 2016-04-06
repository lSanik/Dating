@extends('admin.layout')

@section('styles')

@stop
@section('content')
        <!--body wrapper start-->
<div class="wrapper no-pad" >

    <!--mail inbox start-->
    <div class="mail-box">
        @include('admin.ticket.aside')
        <aside class="lg-side" style="height: 1200px">

            <div class="inbox-body">
                @foreach($tickets as $t)

                <div class="heading-inbox row">

                    <div class="col-md-10">
                        <h4> {{ $t->subject }}  [Тематика: {{ trans('support.'.$t->name) }}]  </h4>

                    </div>
                    <div class="col-md-2">
                            {!! Form::open(['url' => App::getLocale().'/admin/support/close/'.$t->id]) !!}
                            {!! Form::submit(trans('buttons.close'),['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                    </div>

                </div>
                <div class="sender-info">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="pull-left">
                                <img alt="" src="/uploads/admins/{{ $t->avatar }}">
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