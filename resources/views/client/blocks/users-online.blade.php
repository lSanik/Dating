<header>
    <h2> Users online </h2>
</header>
@if($users)
    @foreach($users as $u)
        @if($u->isOnline())
            <div class="col-md-12">
                <div class="col-md-4">
                    <img src="{{ url('/uploads/girls/avatars/'.$u->avatar) }}">
                </div>
                <div class="col-md-8">
                    {{ $u->first_name }} | ID: {{$u->id}}
                    <a href="{{ url('/'.App::getLocale().'/profile/'.$u->id.'/message/') }}"><img src="{{ url('/assets/img/note.png') }}" alt="Leave a message" title="Leave a message"></a>
                    <a href="#chat"><img src="/assets/img/interface.png" alt="Chat now" title="Chat now!"></a>
                </div>
            </div>
        @endif
    @endforeach
@endif