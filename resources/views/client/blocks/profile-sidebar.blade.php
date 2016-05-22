<ul class="nav">
    <li><a href="/profile/{{ Auth::user()->id }}">{{ trans('profile.my') }}</a></li>
    <li><a href="/profile/{{ Auth::user()->id }}/photo/">{{ trans('profile.photo') }}</a></li>
    <li><a href="/profile/{{ Auth::user()->id }}/video/">{{ trans('profile.video') }}</a></li>
    <li><a href="/search">{{ trans('search.search') }}</a></li>
    <li><a href="/profile/{{ Auth::user()->id }}/mail/">{{ trans('mail.mail') }}</a></li>
    <li><a href="/profile/{{ Auth::user()->id }}/smiles/">{{ trans('profile.smiles') }}</a></li>
    <li><a href="/users/online/">{{ trans('users.online') }}</a></li>
    @if( Auth::user()->hasRole('Male'))
        <li><a href="/antiscram">{{ trans('profile.antiscram') }}</a></li>
        <li><a href="/profile/{{ Auth::user()->id }}/finance">{{ trans('profile.finance') }}    </a></li>
    @endif
    @if( Auth::user()->hasRole('Female') )
        <li><a href="/profile/{{ Auth::user()->id }}/gifts">{{ trans('profile.gifts') }}</a></li>
        <li><a href="/profile/{{ Auth::user()->id }}/sendMails">{{ trans('profile.sendMails') }}</a></li>
    @endif
</ul>