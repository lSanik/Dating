@extends('client.profile.profile')

@section('profileContent')
    <div class="row">
        @if(empty($user))
            <div class="alert-block alert-danger" style="padding: 20px;">
                <a href="{{ url('/'. App::getLocale() . '/profile/'.$id) }}">{{ trans('profile.empty') }}</a>
            </div>
        @endif
        @foreach($user as $u)
            <div class="avatar col-md-4"><img src="{{ url('/uploads/girls/avatars/'.$u->avatar) }}" width="100%"/></div>
            <div class="user_data col-md-6">
                <div class="row">
                    <div class="name">
                        <header>{{ $u->first_name }} | ID: {{ $u->uid }}</header>
                    </div>
                </div>
                <div class="row info">
                    <div class="col-md-6"><strong>{{ trans('profile.age') }}:</strong> {{ date('Y-m-d') - $u->birthday }}</div>
                    <div class="col-md-6"><strong>{{ trans('profile.country') }}:</strong> {{ trans('country.'.$u->country) }}</div>
                </div>
                <div class="row info">
                    <div class="col-md-6"><strong>{{ trans('profile.birthday') }}:</strong> {{ $u->birthday }}</div>
                    <div class="col-md-6"><strong>{{ trans('profile.city') }}:</strong>{{ trans('city.'.$u->city) }}</div>
                </div>
                <div class="row info">
                    <div class="col-md-6"><strong>{{ trans('profile.horoscope') }}:</strong> {{ $u->birthday }}</div>
                    <div class="col-md-6"><strong>{{ trans('profile.height') }}:</strong> {{ $u->height }}</div>
                </div>
                <div class="row info">
                    <div class="col-md-6"><strong>{{ trans('profile.weight') }}:</strong> {{ $u->weight }}</div>
                    <div class="col-md-6"><strong>{{ trans('profile.hair') }}:</strong> {{ trans('profile.'.$u->hair) }}</div>
                </div>
                <div class="row info">
                    <div class="col-md-6"><strong>{{ trans('profile.eyes') }}:</strong> {{ trans('profile.'.$u->eye) }}</div>
                    <div class="col-md-6"><strong>{{ trans('profile.education') }}:</strong> {{ trans('profile.'.$u->education) }}</div>
                </div>
                <div class="row info">
                    <div class="col-md-6"><strong>{{ trans('profile.religion') }}:</strong> {{ trans('profile.'.$u->religion) }}</div>
                    <div class="col-md-6"><strong>{{ trans('profile.kids') }}:</strong> {{ trans('profile.'.$u->kids) }}</div>
                </div>
                <div class="row info">
                    <div class="col-md-6"><strong>{{ trans('profile.want_kids') }}:</strong> {{ trans('profile.'.$u->want_kids) }}</div>
                    <div class="col-md-6"><strong>{{ trans('profile.family') }}:</strong> {{ trans('profile.'.$u->family) }}</div>
                </div>
                <div class="row info">
                    <div class="col-md-6"><strong>{{ trans('profile.smoke') }}:</strong> {{ trans('profile.'.$u->smoke) }}</div>
                    <div class="col-md-6"><strong>{{ trans('profile.drink') }}:</strong> {{ trans('profile.'.$u->drink) }}</div>
                </div>
                <div class="row info">
                    <div class="col-md-6"><strong>{{ trans('profile.occupation') }}:</strong> {{ trans('profile.'.$u->occupation) }}</div>
                    <div class="col-md-6"></div>
                </div>
            </div>
            <div class="row" id="buttons">
                <div class="col-md-4">
                    <div class="row girl-action">
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <img src="/assets/img/video.png" alt="Webcam online" title="Webcam online">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <a href="#chat"><img src="/assets/img/interface.png" alt="Chat now" title="Chat now!"></a>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <a href="{{ url('/'. App::getLocale() . '/profile/'. $u->uid . '/message') }}"><img src="/assets/img/note.png" alt="Leave a message" title="Leave a message"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6"> </div>
            </div>
            <div class="row col-md-12">
                <div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#about" aria-controls="about" role="tab" data-toggle="tab">{{ trans('profile.about') }}</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">{{ trans('profile.looking') }}</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="about">
                            {{ $u->about }}
                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile">
                            {{ $u->looking }}
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>

@stop
