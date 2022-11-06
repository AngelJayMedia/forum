@component('mail::message')
**{{ $reply->author()->name() }}** has replied to this thread

@component('mail::panel')
{{ $panel->excerpt(250) }}
@endcomponent

@component('mail::button', ['url' => route('threads.show', ['category' => $reply->replyAble()->category->slug(), $reply->replyAble()->slug()])])
    View Thread
@endcomponent

Thanks,
Central

@endcomponent