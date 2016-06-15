@extends('client.profile.profile')

@section('profileContent')
    <div class="row">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                    {{ trans('mail.income') }}
                </a>
            </li>
            <li role="presentation" class="">
                <a href="#send" aria-controls="send" role="tab" data-toggle="tab">
                    {{ trans('mail.outcome') }}
                </a>
            </li>
            <li role="presentation">
                <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">
                    {{ trans('mail.admin') }}
                </a>
            </li>
            <li role="presentation">
                <a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">
                    {{ trans('mail.black') }}
                </a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content" style="background-color: white">
            <div role="tabpanel" class="tab-pane active" id="home">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('mail.who') }}</th>
                                <th>{{ trans('mail.message') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($to as $f)
                            <tr>
                                <td>{{ $f->mid }}</td>
                                <td>
                                    <a href="/{{ App::getLocale() }}/profile/{{ $f->uid }}/message"><img src="/uploads/girls/avatars/{{ $f->avatar }}" width="32px"> {{ $f->first_name }}</a>
                                </td>
                                <td>{{ substr($f->message, 0, 30) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                <div class="text-center">
                    {{ $to->links() }}
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="send">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ trans('mail.to') }}</th>
                        <th>{{ trans('mail.message') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($from as $f)
                            <tr>
                                <td>{{ $f->mid }}</td>
                                <td>
                                    <a href="/{{ App::getLocale() }}/profile/{{ $f->uid }}/message"><img src="/uploads/girls/avatars/{{ $f->avatar }}" width="32px"> {{ $f->first_name }}</a>
                                </td>
                                <td>{{ substr($f->message, 0, 30) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {{ $from->links() }}
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="messages">...</div>
            <div role="tabpanel" class="tab-pane" id="settings">...</div>
        </div>
    </div>
@stop