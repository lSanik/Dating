@extends('client.profile.profile')

@section('profileContent')
    <div class="row">
        <div class="hidden">
            {{ csrf_field() }}
        </div>
        @foreach($user as $u)
            <div class="avatar col-md-4 col-xs-6"><img src="{{ url('/uploads/girls/avatars/'.$u->avatar) }}" width="100%"/></div>
            <div id="mobile_ver">
                <div class="col-md-6 col-xs-6"> 
                    <div class="row info mobile_ver">
                        <div class="name text-right">
                            <header>{{ $u->first_name }} <span class="prifile_id">| ID: <span id="id">{{ $u->uid }}</span> </span>
                            @if( (Auth::user()) && (Auth::user()->hasRole('Female')) )
                                 <i class="fa fa-check" aria-hidden="true"></i> 
                            @endif
                            </header>
                        </div>
                        <div class="text-right">ID: {{ $u->uid }}</div>
                        <div class="text-right">{{ trans('profile.age') }}: {{ date('Y-m-d') - $u->birthday }}</div>
                        <div class="text-right">From: {{ trans('country.'.$u->country) }}</div>
                        <div class="icons">
                            <i class="fa fa-smile-o" aria-hidden="true"></i>
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <i class="fa fa-comments" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="four_icons">
                            <div class="col-xs-3">Photos</div>
                            <div class="col-xs-3">Videos</div>
                            <div class="col-xs-3">Likes</div>
                            <div class="col-xs-3">Gift</div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="col-md-6 col-xs-6">
                        <ul class="mob_info">
                            <li>{{ trans('profile.country') }}: {{ trans('country.'.$u->country) }}</li>
                            <li>{{ trans('profile.height') }}: {{ $u->height }}</li>
                            <li>{{ trans('profile.eyes') }}: {{ trans('profile.'.$u->eye) }}</li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <ul class="mob_info">
                            <li>{{ trans('profile.horoscope') }}: horoscope (Db err)</li>
                            <li>{{ trans('profile.height') }}: {{ $u->weight }}</li>
                            <li>{{ trans('profile.hair') }}: {{ trans('profile.'.$u->hair) }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <header>About</header>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi ex corporis ad ratione nemo reprehenderit laudantium soluta, facere excepturi, possimus fugit modi quod quisquam vitae similique necessitatibus blanditiis, repellat fuga?</p>
                </div>
            </div>
            <div id="max_info">
                <div class="user_data col-md-6 col-xs-6">
                    <div class="row info">
                        <div class="name">
                            <header>{{ $u->first_name }} <span class="prifile_id">| ID: {{ $u->uid }} </span>
                            @if( (Auth::user()) && (Auth::user()->hasRole('Female')) )
                                 <i class="fa fa-check" aria-hidden="true"></i> 
                            @endif
                            </header>
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
                    <!-- todo: fix view -->
                        <div class="col-md-2">
                            <button name="horoscope" class="btn btn-success">Show horoscope compability</button>
                            <button name="flp" class="btn btn-success">○	имя + фамилия + телефон </button>
                            <button name="fle" class="btn btn-success">○	имя + фамилия + email </button>
                        </div>
                </div>
                <div class="row col-md-12">
                    <div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#about" aria-controls="about" role="tab" data-toggle="tab">{{ trans('profile.about') }}</a></li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">{{ trans('profile.looking') }}</a></li>
                            <li role="presentation"><a href="#partner" aria-controls="partner" role="tab" data-toggle="tab">@Partner link</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="about">
                                {{ $u->about }}
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile">
                                {{ $u->looking }}
                            </div>
                            <div role="tabpanel" class="tab-pane" id="partner">
                                @Partner massage (Need edit DB table for it.)
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row col-md-12 gallery">
                <hr />
                    <header>Gallery</header>
                    <div class="owl online">
                        <div class="item">
                            <div class="row text-center" id="photo">
                                <img src="/uploads/girls/avatars/"/>
                            </div>
                        </div>
                    </div>
                <a href="#" class="photo_link">All Photos</a>
                </div>
            </div>
        @endforeach
    </div>

@stop

@section('additional_scripts')
    <script>
        var $ = jQuery.noConflict();

        $(document).ready(function(){
            $('button[name="horoscope"]').click(function(){
               //todo window with information about "money"

                $.ajax({
                    type: "POST",
                    url: '{{ url('/horoscope') }}',
                    data: {girl_id: parseInt($('#id').html()), _token: $('input[name="_token"]').val()},
                    success: function( response ) {
                        $('#serviceModal').modal();
                    },
                    error: function( response ) {
                        $('#serviceModal').modal();
                    }
                })
            });

            $('button[name="flp"]').click(function(){
                //todo window with information about "money"

                $.ajax({
                    type: "POST",
                    url: '{{ url('/flp') }}',
                    data: {girl_id: parseInt($('#id').html()), _token: $('input[name="_token"]').val()},
                    success: function( response ) {
                        $('#serviceModal').modal();
                        $('#serviceModal').find('.modal-body').append(
                                "<div>" + response.first_name + "</div>" +
                                "<div>" + response.last_name + "</div>" +
                                "<div>" + response.phone + "</div>"
                        );
                    },
                    error: function( response ) {
                        $('#serviceModal').modal();
                        $('#serviceModal').find('.modal-body').append(response);
                    }
                })
            });

            $('button[name="fle"]').click(function(){
                //todo window with information about "money"

                $.ajax({
                    type: "POST",
                    url: '{{ url('/fle') }}',
                    data: {girl_id: parseInt($('#id').html()), _token: $('input[name="_token"]').val()},
                    success: function( response ) {
                        $('#serviceModal').modal();
                        $('#serviceModal').find('.modal-body').append(
                            "<div>" + response.first_name + "</div>" +
                            "<div>" + response.last_name + "</div>" +
                            "<div>" + response.email + "</div>"
                        );
                    },
                    error: function( response ) {
                        $('#serviceModal').modal();
                        $('#serviceModal').find('.modal-body').append( response );
                    }
                })
            });

        });
        /**
         * todo: funciton for appending data to modal
         */
    </script>
@stop