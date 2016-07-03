@extends('client.app')

@section('content')
    <div class="container-fluid content-bg">
        <div class="row map-bg">
            <div class="col-md-10 col-md-offset-1" id="chat_container">
                <div class="col-md-12">
                    <div class="col-md-2 bordered" id="users_online">

                    </div>
                    <div class="col-md-8" id="center">
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
                                <div class="__item_from"><img width="32px"/>Message 1</div>
                                <div class="__item_to"><img width="32px"/>Message 2</div>
                                <div> Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила п'ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп'ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.</div>
                                <div> Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила п'ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп'ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.</div>
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
                            PHOTO
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
        }

        #messages > div {
            margin: 15px;
        }

    </style>
@stop
@section('script')

@stop