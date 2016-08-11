@extends('admin.layout')

@section('styles')

@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                @if(Auth::user()->hasRole('Owner'))
                    <header class="panel-heading head-border">
                        {{trans('sender.senderLimit')}}
                    </header>
                    {!! Form::open(['url' => App::getLocale().'/admin/sender/', 'class' => 'form', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group col-md-6">
                        <label for="title">{{ trans('sender.msg_limit_for_partners') }}</label>
                        {!! Form::input('number', 'partner_limit', $sender_partner_limit, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        <label for="title">{{ trans('sender.msg_limit_for_girls') }}</label>
                        {!! Form::input('number', 'girl_limit', $sender_girl_limit, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group text-center">
                        {{ Form::submit(trans('sender.save_limit'), ['class' => 'btn btn-success']) }}
                    </div>
                    {!! Form::close() !!}
                @endif
                <header class="panel-heading head-border">
                    {{trans('sender.templateSender')}}
                </header>
                    <table class="table table-hovered">
                        <thead>
                            <th>ID</th>
                            <th>{{trans('sender.fromTheGirl')}}</th>
                            @if( Auth::user()->hasRole('Owner') || Auth::user()->hasRole('Moder') )
                                <th> {{trans('sender.partner')}}</th>
                            @endif
                            <th>{{trans('sender.header')}}</th>
                            <th>{{trans('sender.letterState')}}</th>
                            <th>{{trans('sender.coverageTheMan')}}</th>
                            <th>{{trans('sender.lastEdit')}}</th>
                            <th><i class="fa fa-cogs"></i> {{trans('sender.control')}}</th>
                        </thead>
                        <tbody>
                        @foreach($all_messages as $message)
                            <tr>
                                <td>{{ $message->id }}</td>
                                <td>{{ $message->girl_id }}</td>
                                @if( Auth::user()->hasRole('Moder') )
                                    <td>{{ $message->partner_id }}</td>
                                @endif
                                <td> {{ $message->title }} </td>
                                <td>
                                    @if($message->status==0)
                                        {{trans('sender.status_cheking')}}
                                    @elseif($message->status==1)
                                        {{trans('sender.status_true')}}
                                    @elseif($message->status==2)
                                        {{trans('sender.status_false')}}
                                    @elseif($message->status==3)
                                        {{trans('sender.status_sended')}}
                                    @endif
                                </td>
                                <td> {{ count(unserialize($message->mans_id)) }} </td>
                                <td> {{ $message->updated_at }} </td>
                                <td>
                                    <a href="{{ url(App::getLocale().'/admin/sender/send/'.$message->id) }}" class="btn btn-success btn-xs @if($message->status!=1){{'disabled'}}@endif"><i class="fa fa-check"></i></a>
                                    <a href="{{ url(App::getLocale().'/admin/sender/edit/'.$message->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs"  href="{{ url(App::getLocale().'/admin/sender/drop/'.$message->id) }}"><i class="fa fa-trash-o "></i></a>
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