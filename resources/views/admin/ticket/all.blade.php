@extends('admin.layout')

@section('styles')

@stop

@section('content')
        <!--mail inbox start-->
<div class="mail-box">
    @include('admin.ticket.aside')
    <aside class="lg-side" style="height: 1200px">

        <div class="inbox-body no-pad">

            <table class="table table-inbox table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>#</th>
                        <th></th>
                        <th>Партене</th>
                        <th>Тематика</th>
                        <th>Тема</th>
                        <th></th>
                        <th>Дата</th>
                    </tr>

                </thead>
                <tbody>
                @foreach($tickets as $t)

                        <tr @if($t->status == 0) class="unread" @endif>
                        <td class="inbox-small-cells">
                            <label class="checkbox-custom check-success">
                                <input type="checkbox" value="{{ $t->id }}" id="c{{ $t->id }}"> <label for="c{{ $t->id }}"> </label>
                            </label>
                        </td>
                        <td>
                            <strong> #ID: {{ $t->uid }} </strong>
                        </td>
                        <td>
                            <a href="#" class="avatar"> <!-- @todo UserAvatar -->
                                <img src="/uploads/admins/{{ $t->avatar }}" width="50px" alt=""/>
                            </a>
                        </td>

                        <td class="view-message">
                            <a href="/{{ App::getLocale() }}/admin/support/show/{{ $t->id }}"> {{ $t->first_name }} {{ $t->last_name }} </a>
                        </td>

                        <td class="view-message">{{ trans('support.'.$t->name) }}</td>
                        <td class="view-message">{{ $t->subject }}</td>
                        <td class="view-message"></td>
                        <td class="view-message  text-right">{{ $t->updated_at }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </aside>
</div>
<!--mail inbox end-->
@stop

@section('scripts')

@stop