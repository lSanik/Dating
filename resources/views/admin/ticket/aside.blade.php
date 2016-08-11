<aside class="sm-side">
    <div class="m-title">
        <h3>{{trans('/admin/support.feedback')}}</h3>
        <span> @if( $unread_ticket_count  )
                {{ $unread_ticket_count }}
            @else
                0
            @endif {{trans('/admin/support.unreadMessages')}}</span>
    </div>
    <div class="inbox-body">
        <a class="btn btn-compose" href="/{{ App::getLocale() }}/admin/support/new">
            {{trans('/admin/support.new')}}
        </a>
    </div>
    <ul class="inbox-nav inbox-divider">
        <li>
            <a href="/{{ App::getLocale() }}/admin/support"><i class="fa fa-inbox"></i> {{trans('/admin/support.active')}} <span class="label label-danger pull-right">@if( $unread_ticket_count  )
                        {{ $unread_ticket_count }}
                    @else
                        0
                    @endif </span></a>
        </li>
        <li>
            <a href="/{{ App::getLocale() }}/admin/support/answered"><i class="fa fa-envelope"></i> {{trans('/admin/support.responseSent')}} </a>
        </li>
        <li>
            <a href="/{{ App::getLocale() }}/admin/support/closed"><i class="fa fa-trash"></i> {{trans('/admin/support.closed')}}</a>
        </li>
    </ul>

</aside>