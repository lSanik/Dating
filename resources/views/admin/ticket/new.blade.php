@extends('admin.layout')

@section('styles')

        <link rel="stylesheet" href="{{ url('/assets/js/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}">

@stop

@section('content')

        <!--mail inbox start-->
<div class="mail-box">
    <aside class="sm-side">
        <div class="m-title">
            <h3>Inbox</h3>
            <span>14 unread mail</span>
        </div>
        <div class="inbox-body">
            <a class="btn btn-compose" href="#">
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
    <aside class="lg-side">
        <div class="inbox-head">
            <div class="mail-option">
                <h3 class="pull-left">New Mail</h3>
            </div>
        </div>
        <div class="inbox-body">
            {!! Form::open(['url' => '/admin/support/', 'class' => 'form-horizontal', 'method' => 'POST']) !!}

                <div class="compose-mail">

                        <!-- div class="form-group">
                            <label for="to" class="col-sm-1 control-label">To</label>
                            <div class="col-sm-11">
                                <input type="text" name="to" tabindex="1" id="to" class="form-control">
                            </div>
                        </div -->

                        <div class="form-group">
                            <label for="subjects" class="col-sm-1 control-label">Subject</label>
                            <div class="col-sm-11">
                                <select name="subjects" class="form-control">
                                    @foreach($selects as $s)
                                        <option value="{{ $s->id }}"> {{ trans('support.'.$s->name) }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subject" class="col-sm-1 control-label">Subject</label>
                            <div class="col-sm-11">
                                <input type="text" name="subject" tabindex="1" id="subject" class="form-control">
                            </div>
                        </div>
                        <div class="compose-editor form-group">
                            <label for="subject" class="col-sm-1 control-label">Message</label>
                            <div class="col-sm-11">
                                <textarea name="message" class="wysihtml5 form-control" rows="9"></textarea>
                            </div>
                        </div>
                        <hr/>
                </div>
                <div class="compose-btn pull-right">
                    <input type="submit" value="{{  trans('buttons.send') }}" class="btn  btn-success" >
                </div>
            {!! Form::close() !!}
        </div>
    </aside>
</div>
<!--mail inbox end-->


@stop

@section('scripts')
    <!--bootstrap-wysihtml5-->
    <script type="text/javascript" src="{{ url('/assets/js/bootstrap-wysihtml5/wysihtml5-0.3.0.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/js/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}"></script>

    <script>
        jQuery(document).ready(function(){
            $('.wysihtml5').wysihtml5();
        });
    </script>
@stop