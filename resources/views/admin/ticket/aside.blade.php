<aside class="sm-side">
    <div class="m-title">
        <h3>Обратная связь</h3>
        <span> @if( $unread_ticket_count  )
                {{ $unread_ticket_count }}
            @else
                0
            @endif непрочитанных сообщений</span>
    </div>
    <div class="inbox-body">
        <a class="btn btn-compose" href="/{{ App::getLocale() }}/admin/support/new">
            NEW
        </a>
    </div>
    <ul class="inbox-nav inbox-divider">
        <li>
            <a href="/{{ App::getLocale() }}/admin/support"><i class="fa fa-inbox"></i> Активные <span class="label label-danger pull-right">@if( $unread_ticket_count  )
                        {{ $unread_ticket_count }}
                    @else
                        0
                    @endif </span></a>
        </li>
        <li>
            <a href="/{{ App::getLocale() }}/admin/support/answered"><i class="fa fa-envelope"></i> Ответ отправлен </a>
        </li>
        <li>
            <a href="/{{ App::getLocale() }}/admin/support/closed"><i class="fa fa-trash"></i> Закрытые </a>
        </li>
    </ul>

</aside>