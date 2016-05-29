<div class="item">
    <div class="row text-center photo">
        <img src="{{ url('/uploads/girls/avatars/'.$u->avatar) }}"/>
    </div>
    <hr/>
    <div class="row girl-action">
        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
            <img src="/assets/img/video.png" alt="Webcam online" title="Webcam online">
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
            <a href="#chat"><img src="/assets/img/interface.png" alt="Chat now" title="Chat now!"></a>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
            <a href="{{ url('/'.App::getLocale().'/profile/'.$u->id.'/message/') }}"><img src="/assets/img/note.png" alt="Leave a message" title="Leave a message"></a>
        </div>
    </div>
    <hr/>

    <div class="row text-center g__info">
        <div class="col-md-6">{{ $u->first_name }}</div>
        <div class="col-md-6"><b>ID </b>: {{ $u->id }} </div>
        <div class="col-md-6"> <a href="{{ url('/'.App::getLocale().'/profile/show/'.$u->id) }}" class="btn btn-small btn-primary">{{ trans('buttons.profile') }}</a></div>
        <div class="col-md-6">
            @if($u->isOnline())
                <button class="btn btn-small btn-success"> Online </button>
            @endif
        </div>
    </div>
</div>