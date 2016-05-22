@extends('client.app')

@section('content')

    <div class="container">
        <div class="row" style="margin-bottom: 50px; margin-top: 50px">
            <div class="col-md-9" id="blog">
                <div class="col-md-10 col-md-offset-1">
                    @foreach($posts as $p)

                            <div class="title"><h2>{{ $p->title }}</h2></div>
                            <div class="image text-center"><img src="{{ url('/uploads/blog/'.$p->cover_image) }}" width="70%"></div>
                            <div class="body text-justify">{!! mb_substr($p->body, 0, 500, 'UTF-8') . '...' !!}</div>
                            <div class="button"><a href="{{ url('/'.App::getLocale().'/blog/'.$p->id) }}" class="btn btn-pink">{{ trans('blog.readMore') }}</a> </div>
                        <hr/>
                    @endforeach
                </div>
                <div class="paginate text-center">
                    {{ $posts->links() }}
                </div>
            </div>

        </div>
    </div>

@endsection

@section('styles')
<style>

</style>


@stop