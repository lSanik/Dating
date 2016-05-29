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
            <li role="presentation">
                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
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
                <div class="row">

                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="profile">...</div>
            <div role="tabpanel" class="tab-pane" id="messages">...</div>
            <div role="tabpanel" class="tab-pane" id="settings">...</div>
        </div>
    </div>
@stop