@extends('client.app')

@section('content')
    <div class="container-fluid content-bg">
        <div class="row map-bg">
            <div class="col-md-10 col-md-offset-1" id="chat_container">
                <div class="col-md-12">
                    <div class="col-md-3 bordered" id="users_online">

                    </div>

                    <div class="col-md-6" id="center">
                        <div class="col-md-12 bordered" id="chat_messages_area">
                            <div id="chat_header">
                                <div class="pull-left">
                                    {{ trans('chat.chat') }}
                                </div>
                                <div class="pull-right">
                                    chat start / stop | ballance | time
                                </div>
                            </div>
                            <div id="messages">
                                <!--<div class="__item_from"><img width="32px"/>Message 1</div>
                                <div class="__item_to"><img width="32px"/>Message 2</div>-->
                                <div class="hello">Выберите контакт</div>
                            </div>
                        </div>
                        <div class="col-md-6 text-center bordered" id="chat_send_form">
                            {!! Form::open(['id' => 'chat_form']) !!}
                            <textarea class="form-control" name="message"></textarea>
                            {!! Form::submit(trans('chat.send'), ['class' => 'btn btn-pink']) !!}
                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-6 bordered" id="chat_video">
                            VIDEO
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div id="user" class="bordered">
                            PHOTO
                        </div>
                        <div id="contacts" class="bordered">
                            @foreach($user_contact_list_data as $contact)
                                <div class="contact">
                                    <a class="" href="#contact" data-id="{{$contact[0]->sessionID}}">
                                        <div class="online">
                                            <div class="is_online @if($contact[0]->sessionID==null) {{'no'}} @endif">

                                            </div>
                                        </div>
                                        <div class="image">
                                            <img style="width: 100%;border-radius: 50px;" src="{{ url('/uploads/'.$contact[0]->avatar) }}">
                                        </div>
                                        <div class="name">
                                            <span>{{ $contact[0]->first_name }} {{ $contact[0]->last_name }}</span>
                                        </div>
                                        <div class="age">
                                            <span>({{ date('Y-m-d') - $contact[0]->birthday }})</span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="popup-send-invite">
        <div class="chat-invite">Пригласить в чат <span class="name">Наталья </span></div>
        <a id="chat_yes" style="cursor:pointer;">Да</a>
        <a id="chat_no" style="cursor:pointer;">Нет</a>
    </div>

    <div class="popup-get-invite">
        <div class="chat-invite">Приглашение в чат от<span class="name">Наталья </span></div>
        <div class="chat-invite">Принять?</div>
        <a id="chat_yes_get" style="cursor:pointer;">Да</a>
        <a id="chat_no_get" style="cursor:pointer;">Нет</a>
    </div>

    <script>
        window.onload = function() {

            jQuery("#contacts a").on("click", function () {
                //console.log(jQuery(this).data('id'));
                chat_partner=jQuery(this);
                jQuery('.popup-send-invite').css("display","block");
            });

            jQuery("#chat_yes").on("click", function () {
                jQuery('.popup-send-invite').css("display","none");
                //console.log(chat_partner.data('id'));
                send_to(null,chat_partner.data('id'),'invite');
            });

            jQuery("#chat_no").on("click", function () {
                jQuery('.popup-send-invite').css("display","none");
            });

// window.chat.readyState
            chatConnect();
            function sec() {
                 if(window.chat.readyState!=1){
                 console.log('Connection lost... Retry');
                    chatConnect();
                 }
            }
            setInterval(sec, 5000);// использовать функцию

            function chatConnect(){
                document.cookie = "user_key={{session()->getId()}}";
                window.chat = new WebSocket('ws://{{$_SERVER['SERVER_NAME']}}:8080');

                window.chat.onopen = function (e) {
                    console.log("Connection established!");
                };
                //var recived_message=[];
                window.chat.onmessage = function (e) {
                    console.log('Получены данные: ' + e.data);
                    recived_message = e.data;

                    if(JSON.parse(recived_message).status=='send_invite'){
                        var invite = JSON.parse(recived_message);
                        jQuery('.popup-get-invite .name').html(invite.from_user_data['first_name']);
                        jQuery('.popup-get-invite').css("display","block");


                    }else if(JSON.parse(recived_message).status=='invite_accepted'){
                        chat_started(JSON.parse(recived_message));
                    }
                    jQuery("#chat_yes_get").on("click", function () {
                        jQuery('.popup-get-invite').css("display","none");
                        chat_accept_invite(invite);
                    });
                    jQuery("#chat_no_get").on("click", function () {
                        jQuery('.popup-get-invite').css("display","none");
                    });
                    //console.log(JSON.parse(recived_message));
                    //on_message();
                };
            }
            function chat_accept_invite(invite){
                send_to(null,invite.from_user_data[0]['sessionID'],'accepted');
                chat_started(invite);
            }
            function chat_started(data){
                console.log('chat started');

                jQuery('#messages').html("Чат начат");
                window.chat_messages=jQuery('#messages');
                window.init_chat=data;
                window.chat_oponent_id=data.from_user_data[0]['sessionID'];
                //initSend(jQuery('#chat_form'));
            }
            function chat_started_acepted(data){
                console.log('chat started acepted');
                console.log(data);
                jQuery('#messages').html("Чат начат");
               // window.chat_messages=jQuery('#messages');
                //window.init_chat=data;
                //window.chat_oponent_id=data.from_user_data[0]['sessionID'];
                //initSend(jQuery('#chat_form'));
            }

            function initSend(submit_event) {

                    submit_event.submit(function (e) {
                    e.preventDefault();
                    var chat_message=jQuery('#chat_form textarea').val();

                    if (window.init_chat !== undefined) {
                        console.log(window.chat_oponent_id);
                        console.log(chat_message);
                        send_to(chat_message,window.chat_oponent_id,'message');
                    } else{
                        alert('Выберите собеседника');
                    }
                    return false;
                });
            }
            initSend(jQuery('#chat_form'));
            //console.log(recived_message);
            function send_to(message, to_id, status) {
                var data = {
                    'to_id': to_id,
                    'message': message,
                    'value': status
                };
                console.log(data);
                window.chat.send(JSON.stringify(data));
                //console.log(data);
            };
        }
    </script>
@stop
@section('styles')
    <style>
        .popup-get-invite .name{
            display: inline-block;
            width: 100%;
        }
        .popup-get-invite{
            box-shadow: 5px 5px 10px black;
            max-width: 200px;
            height: 85px;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(255, 255, 255, 0.97)!important;
            overflow: hidden!important;
            -webkit-transition: .6s ease-out!important;
            -moz-transition: .6s ease-out!important;
            -o-transition: .6s ease-out!important;
            transition: .6s ease-out!important;
            margin: auto!important;
            z-index: 200001!important;
            text-align: center;
            display:none;
        }
        .popup-send-invite{
            box-shadow: 5px 5px 10px black;
            max-width: 200px;
            height: 55px;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(255, 255, 255, 0.97)!important;
            overflow: hidden!important;
            -webkit-transition: .6s ease-out!important;
            -moz-transition: .6s ease-out!important;
            -o-transition: .6s ease-out!important;
            transition: .6s ease-out!important;
            margin: auto!important;
            z-index: 200001!important;
            text-align: center;
            display:none;
        }
        #contacts .contact{
            display: inline-block;
            width: 100%;
        }
        #contacts a{
            text-decoration: none;
        }
        #contacts .contact:hover{
            background-color: rgba(189, 189, 189, 0.5);
        }
        #contacts .contact .online{
            display: inline-block;
            width: 5%;
            margin: 0px -5px 0px 10px;
        }
        #contacts .contact .online .is_online.no{
            background-color: red;
            border: 1px solid red;
        }
        #contacts .contact .online .is_online{
            width: 10px;
            height: 10px;
            border: 1px solid green;
            border-radius: 50px;
            background-color: green;
        }
        #contacts .contact .image{
            display: inline-block;
            width: 25%;
            height: auto;
            padding: 10px;
        }
        #contacts .contact .name{
            display: inline-block;
            width: 50%;
        }
        #contacts .contact .age{
            display: inline-block;
            width: 10%;
        }

        .bordered{
            border: 1px solid #ccc;
        }

        #users_online{
            height: 55vh;
        }

        #chat_container{
            padding:30px;
        }

        #chat_messages_area{
            height: 55vh;
            background: white;

        }

        #chat_header{
            height: 5vh;
            border-bottom: 1px solid #ec2860;
        }

        #messages{
            position: absolute;
            overflow: auto;
            height: 50vh;
        }

        #messages > div {
            margin: 15px;
        }

    </style>
@stop
@section('script')

@stop