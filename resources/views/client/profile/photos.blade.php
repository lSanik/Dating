@extends('client.profile.profile')

@section('profileContent')
    <header>{{ trans('profile.albums') }}</header>

    <div class="alert alert-danger">
        <a href="{{ url('/'.App::getLocale().'/profile/'.$id.'/album/add') }}">{{ trans('profile.make_album') }}</a>
    </div>


    @foreach($albums as $a)
        <div class="album">
            <a href="{{ url('/'.App::getLocale().'/profile/'.$id.'/gallery/'.$a->id) }}">
                <img src="{{ url('/uploads/'.$a->cover_image) }}" width="100%">
                <header class="text-center">{{ $a->name }}</header>
            </a>
            @if(Auth::user()->id == $id)
                <div class="remove" data-id="{{ $a->id }}"><i class="fa fa-trash pull-right"></i></div>
            @endif
        </div>
    @endforeach
@stop

@section('styles')
    <style>
        .album{
            width: 20%;
            display: block;
            float: left;
            padding: 10px;
        }

        .remove{
            color: red;
            cursor: pointer;
        }
    </style>
@stop

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.remove').click(function(){

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: '{{ url('remove/album') }}',
                    data: {id : $(this).data('id')},
                    success: function( response ){
                        console.log(response);
                        $(this).parent().remove();
                    },
                    error: function( response ){
                        console.log(response);
                    }
                })
            });
        });
    </script>
@stop