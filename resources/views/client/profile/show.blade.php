@extends('client.profile.profile')

@section('profileContent')
    <div class="row">
        @if(empty($user))
            <div class="alert-block alert-danger" style="padding: 20px;">
                <a href="{{ url('/'. App::getLocale() . '/profile/'.$id) }}">{{ trans('profile.empty') }}</a>
            </div>
        @endif
        @foreach($user as $u)
            <div class="avatar col-md-4">
                @if(file_exists(public_path()."/uploads/girls/avatars/".$u->avatar))
                    <img src="{{ url('/uploads/girls/avatars/'.$u->avatar) }}" width="100%"/>
                @elseif(file_exists(public_path()."/uploads/".$u->avatar))
                    <img src="{{ url('/uploads/'.$u->avatar) }}" width="100%"/>
                @endif
            </div>
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
                        <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                            @if($u->webcam !== 0)
                                <img src="/assets/img/video.png" alt="Webcam online" title="Webcam online">
                            @endif
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                                <a href="#chat"><img src="/assets/img/interface.png" alt="Chat now" title="Chat now!"></a>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                            <a href="{{ url('/'. App::getLocale() . '/profile/'. $u->uid . '/message') }}"><img src="/assets/img/note.png" alt="Leave a message" title="Leave a message"></a>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                            <img id="wink" data-id="{{ $u->uid }}" src="data:image/png;base64,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">
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
            <div class="col-md-12 row">
                <section class="panel panel-default">
                    <header class="panel-heading">{{ trans('profile.gallery') }}</header>
                    <div class="panel-body">
                        @foreach($albums as $a)
                            <a class="gallery" href="{{ url('/'.App::getLocale().'/profile/'.$id.'/gallery/'.$a->id) }}">
                                <img src="{{ url('/uploads/'.$a->cover_image) }}">
                                <p class="text-center">
                                    {{ $a->name }}
                                </p>
                            </a>
                        @endforeach
                    </div>
                </section>
            </div>
    </div>

@stop

@section('styles')
    <style>
        .gallery{
            display: block;
            width: 30%;
            float: left;
            padding: 10px;
        }

        .gallery img{
            width: 100%;
        }

        #wink{
            cursor: pointer;
        }
    </style>

@stop

@section('scripts')
    <script>
        $('#wink').click(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{ url('wink') }}",
                data: {id: $(this).data('id')},
                success: function( response ){
                    console.log( response );
                    alert('winked');
                },
                error: function( response ){
                    console.log( response );
                }

            });
        });
    </script>
@stop