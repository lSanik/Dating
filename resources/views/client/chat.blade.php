@extends('client.app')

@section('content')
    <div class="container-fluid content-bg">
        <div class="row map-bg">
            <div class="col-md-10 col-md-offset-1" id="chat_container">
                <div class="col-md-12">
                    <div class="col-md-2 bordered" id="users_online">
                        @foreach($users as $u)
                            @if($u->isOnline())
                                <a href="#{{ $u->id }}">
                                    <div class="user">
                                        <div class="photo">
                                            @if(file_exists(public_path()."/uploads/girls/avatars/".$u->avatar))
                                                <img src="{{ url('/uploads/girls/avatars/'.$u->avatar) }}" width="50%"/>
                                            @elseif(file_exists(public_path()."/uploads/".$u->avatar))
                                                <img src="{{ url('/uploads/'.$u->avatar) }}" width="50%"/>
                                            @endif
                                        </div>
                                        <div class="name">
                                            {{ $u->first_name }}
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-8" id="center">
                        <div id="chat_header">
                            <div class="pull-left">
                                {{ trans('chat.chat') }}
                            </div>
                            <div class="pull-right">
                                <a href="#" id="start_chat"> Start </a> / <a href="#" id="stop_chat"> Stop </a> | ballance | <div id="time"> 00:00:00 </div>
                            </div>
                        </div>
                        <div class="col-md-12 bordered" id="chat_messages_area">
                            <div id="messages">

                            </div>
                        </div>
                        <div class="col-md-6 text-center bordered" id="chat_send_form">
                            {!! Form::open([]) !!}
                            <textarea class="form-control" name="message"></textarea>
                            {!! Form::submit(trans('chat.send'), ['class' => 'btn btn-pink']) !!}
                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-6 bordered" id="chat_video">
                            VIDEO
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div id="user" class="bordered">
                            @if(file_exists(public_path()."/uploads/girls/avatars/".$user->avatar))
                                <img src="{{ url('/uploads/girls/avatars/'.$user->avatar) }}" width="100%"/>
                            @elseif(file_exists(public_path()."/uploads/".$user->avatar))
                                <img src="{{ url('/uploads/'.$user->avatar) }}" width="100%"/>
                            @endif
                            <h3 class="text-center">{{ $user->first_name }}</h3>
                        </div>
                        <div id="contacts" class="bordered">
                            ACTIVE CONTACTS
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('styles')
    <style>
        .bordered{
            border: 1px solid #ccc;
        }

        #users_online{
            height: 55vh;
            overflow-y: auto;
        }

        #chat_container{
            padding:30px;
        }

        #chat_messages_area{
            height: 55vh;
            background: white;
            overflow-y: auto;
        }

        #chat_header{
            height: 5vh;
            border-bottom: 1px solid #ec2860;
        }

        #messages{
            position: absolute;
            overflow: auto;
        }

        #messages > div {
            margin: 15px;
        }

        #time {
            float: right;
        }

        .photo{
            float: left;
        }

    </style>
@stop
@section('script')
    <script>
        $('form').submit(function(e){
            e.preventDefault();

        });
    </script>
@stop