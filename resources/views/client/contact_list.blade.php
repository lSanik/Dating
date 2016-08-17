@section('content')
        @foreach($user_contact_list_data as $contact)
            <div class="contact">
                <a class="" href="#contact" data-id="{{$contact[0]->sessionID}}">
                    <div class="online">
                        <div class="is_online @if($contact[0]->sessionID==null) {{'no'}} @endif">

                        </div>
                    </div>
                    <div class="image">
                        <img style="width: 100%;border-radius: 50px;" src="{{ url('/uploads/girls/avatars/'.$contact[0]->avatar) }}">
                    </div>
                    <div class="name">
                        <span>{{ $contact[0]->first_name }} {{ $contact[0]->last_name }}</span>
                    </div>
                    <div class="age">
                        <span>({{ date('Y-m-d') - $contact[0]->birthday }})</span>
                    </div>
                </a>
            </div>
        @endforeach
@stop
