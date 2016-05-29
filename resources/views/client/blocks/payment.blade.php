<div class="pricing text-center col-md-3">
    <div class="type">{{ trans('payments.'.$p->name) }}</div>
    <div class="price">{{ $p->price }} LC</div>
    <div class="times">{{ trans('payments.'.$p->term) }}</div>
</div>