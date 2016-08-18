<div class="item">
    <div class="row text-center" id="photo">
        <img src="{{ url('/uploads/'.$u->avatar) }}"/>
    </div>
    <div class="girl-action">
        <ul>
            <div class="cub">
                @if( $u->webcam !== 0)
                <li>
                    <img src="/assets/img/video1.png" alt="Webcam online" title="Webcam online">
                </li>
                @endif
            </div>
            <div class="cub">
                <li>
                    <a href="#chat"><img src="/assets/img/interface1.png" alt="Chat now" title="Chat now!"></a>
                </li>
            </div>
            <div class="cub">
                <li>
                    <a href="{{ url('/'.App::getLocale().'/profile/'.$u->id.'/message/') }}"><img src="{{ url('/assets/img/note1.png') }}" alt="Leave a message" title="Leave a message"></a>
                </li>
            </div>
        </ul>
    </div>

    <div class="col-md-12 text-center g__info">
        <div class="col-md-6"><a class="girl__name" href="{{ url('/'.App::getLocale().'/profile/show/'.$u->id) }}">{{ $u->first_name }}</a><span class="g_name">{{ $u->first_name }}</span></div>
        @if($u->isOnline())
            <div class="col-md-6"><button class="btn btn-small online_btn"> Online </button></div>
        @endif
        <div class="col-md-6 g_id"> <b>ID </b>: {{ $u->id }} </div>
        <div class="col-md-12 profile"> <a href="{{ url('/'.App::getLocale().'/profile/show/'.$u->id) }}" class="btn btn-small btn-profile">{{ trans('buttons.profile') }}</a></div>
    </div>
</div>