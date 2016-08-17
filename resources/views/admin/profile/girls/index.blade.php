@extends('admin.layout')

@section('style')

@stop
@section('content')

    <section class="panel">
        <heading>

        </heading>
        <div class="panel-body">
            <table class="table table-hovered">
                <thead>
                <th>ID</th>
                <th>{{trans('/admin/index.name')}}/{{trans('/admin/index.surname')}}</th>
                <th>{{trans('/admin/index.avatar')}}</th>
                @if( Auth::user()->hasRole('Owner') )
                    <th>{{trans('/admin/index.partner')}}</th>
                @endif
                <th>{{trans('/admin/index.online')}}</th>
                <th>{{trans('/admin/index.webCam')}}</th>
                <th>Hot block</th>
                <th>{{trans('/admin/index.lastEntrance')}}</th>
                <th><i class="fa fa-cogs"></i> {{trans('/admin/index.control')}}</th>
                </thead>
                <tbody>
                @foreach($girls as $girl)
                    <tr>
                        <td>{{ $girl->id }}</td>
                        <td>{{ $girl->first_name }} {{ $girl->last_name }}</td>
                        <td><img width="150px" src="{{ url('uploads/girls/avatars/'.$girl->avatar)}}"></td>
                        @if( Auth::user()->hasRole('Owner') )
                            <td>{{ $girl->partner_id }}</td> <!-- Уточнить что выводить -->
                        @endif

                        <td>
                            @if($girl->isOnline())
                               <button class="btn btn-small online_btn"> Online </button>
                            @else
                                <span class="red">{{ trans('admin.No') }}</span>
                            @endif
                        </td>
                        <td>
                            @if($girl->webcam !== 0)
                                <span class="green">{{ trans('admin.yes') }}</span>
                            @else
                                <span class="red">{{ trans('admin.No') }}</span>
                            @endif
                        </td>
                        <td>
                            @if($girl->hot !== 0)
                                <span class="green">{{ trans('admin.yes') }}</span>
                            @else
                                <span class="red">{{ trans('admin.No') }}</span>
                            @endif
                        </td>
                        <td> {{ $girl->last_login }} </td>
                        <td>
                            <a class="btn btn-success btn-xs"><i class="fa fa-check"></i></a>
                            <a href="{{ url(App::getLocale().'/admin/girl/edit/'.$girl->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                            <a href="{{ url(App::getLocale().'/admin/girl/drop/'.$girl->id) }}" class="btn btn-danger btn-xs" ><i class="fa fa-trash-o "></i></a>
                            <a data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('/admin/index.sender')}}" href="{{ url(App::getLocale().'/admin/sender/new/'.$girl->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-comment-o"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>

@stop
@section('scripts')

@stop