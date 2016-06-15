@extends('client.profile.profile')

@section('profileContent')
    @include('client.blocks.flash-warning')
    <div class="col-md-8">
        <div class="messages">
            @foreach($messages as $m)
                <div class="message">
                    <div class="photo"><img src="/uploads/girls/avatars/{{ $m->ava }}'}}"></div>
                    <div class="name"><a href="">{{ $m->name }}</a></div>
                    <div class="text-left">{{ $m->message }} {{ $m->time }}</div>
                </div>
            @endforeach
        </div>
        <div class="send-form">
            {!! Form::open(['url' => '/'.App::getLocale().'/profile/'.$to.'/message' ]) !!}

                {!! Form::hidden('from', Auth::user()->id) !!}
                {!! Form::hidden('to', $to) !!}
                <div class="form-group">
                  {!! Form::textarea('message', null, ['class' => 'form-control', 'rows' => '3']) !!}
                </div>
                <div class="form-group text-right">
                    <input type="submit" class="btn btn-pink" value="{{ trans('mail.send') }}">
                </div>

            {!! Form::close() !!}
        </div>
    </div>


@stop

@section('styles')
    <style>
        .messages {
            margin-top: 30px;
            height: 25vh;
            overflow-y: scroll;
            padding: 15px;
            border: 1px solid #ccc;
            background: #ffffff;
        }

        .message{
            width: 100%;
            word-break: break-all;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .message:nth-child(even){
            border: 1px solid #ccc;
            background-color: #ebebeb;
            clear: both;
            text-align: right;
        }
        .message:nth-child(even) .photo{
            float: right;
        }

        .photo{
            height: 32px;
            width: 32px;
            float: left;
            line-height: 48px;
            margin: 5px;
        }
        .photo img{
            width: 32px;
            height: 32px;
            display: block;
            margin: 0 auto;
        }


        .send-form{

        }
    </style>
@stop