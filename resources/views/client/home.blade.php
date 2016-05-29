@extends('client.app')

@section('styles')
    <link rel="stylesheet" href="{{ url('/assets/css/owl.carousel.css') }}">
@stop

@section('content')
    @include('client.blocks.slider')
<div class="container-fluid content-bg">
    <div class="row map-bg">
        <div class="container">
            <div class="row">
                <header class="text-center">
                    @if(!Auth::user() || Auth::user()->hasRole('male'))
                        <h2>{{ trans('pages.girls') }}</h2>
                    @else
                        <h2>{{ trans('pages.mans') }}</h2>
                    @endif
                </header>

                <div class="owl online">
                    @foreach($users as $u)
                        @include('client.blocks.user-item')
                    @endforeach
                </div>

            </div>
            @if( !Auth::user() || Auth::user()->hasRole('male') || Auth::user()->hasRole('alien'))
                @if(!empty($topHot))
                    <div class="row">
                        <header class="text-center"> <h2>Top Hot Girls</h2> </header>

                        <div class="owl top-hot">
                            @foreach($topHot as $u)
                                @include('client.blocks.user-item')
                            @endforeach
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>
<div class="container home-text">
    <header class="text-center"><h1> Top Rated Hot Girls </h1></header>
    <div id="panes">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer in augue nec felis hendrerit viverra. Maecenas facilisis nulla non fringilla congue. Duis nec ligula tincidunt, porttitor nibh eget, volutpat arcu. Donec ac porta sem. Sed eget cursus sapien, at consequat purus. In et massa mattis, vulputate nibh non, bibendum lorem. Pellentesque gravida sodales quam a sollicitudin. Suspendisse finibus, quam eu malesuada rhoncus, dolor tortor efficitur turpis, vel pulvinar ex erat sed tortor. Nulla nec tellus vel sem tempor lacinia eget vel turpis. Nam libero ex, imperdiet id mi sit amet, viverra maximus ligula. Integer aliquam est sed turpis aliquet, vel mattis enim aliquet. Praesent pellentesque dictum tortor, ut commodo nulla aliquam vel. Aliquam vestibulum tellus auctor urna venenatis luctus. In nunc nisi, lobortis sit amet ante a, fermentum ultricies dui.

        Aenean quis arcu ac felis elementum venenatis. Maecenas vel leo lorem. Proin felis dui, lacinia vel nibh vitae, gravida finibus tellus. Aliquam luctus nibh a fermentum facilisis. Nunc ultricies purus at sem gravida, viverra varius justo eleifend. Curabitur rhoncus fermentum eros, eu ultricies odio rutrum a. Nunc mi ex, posuere ut tempus quis, laoreet ac felis.

        Donec interdum nec ipsum id iaculis. Praesent mi eros, luctus eget hendrerit sit amet, scelerisque ac elit. Maecenas eu tortor pulvinar, lacinia odio non, dignissim erat. Fusce nec ex sit amet augue posuere pellentesque a id libero. Pellentesque hendrerit, nibh tincidunt tempus pulvinar, dolor neque sollicitudin sem, quis maximus diam ex ut dolor. Pellentesque et hendrerit turpis, at porttitor sem. Fusce semper non nibh id dictum. In hac habitasse platea dictumst. Nam tincidunt felis at arcu ultricies, a bibendum diam maximus. Vestibulum eget mauris id nibh congue posuere sed sit amet sem. Ut sed orci neque.

        Aenean at nunc massa. In in molestie massa, pellentesque consequat eros. Cras eget lectus efficitur, pellentesque odio sed, pharetra mi. Duis euismod lobortis imperdiet. Mauris pulvinar posuere malesuada. Sed sodales cursus ex, et gravida arcu aliquet in. Nunc pulvinar, nisl id elementum ultricies, justo dui porttitor tellus, sed tristique enim velit vel nisi. Fusce nec cursus est, eu faucibus metus. Nulla facilisi. Aenean tempor, arcu in elementum lacinia, urna mi consequat nisi, a varius eros massa quis lectus. Nunc elementum dictum rutrum. Vestibulum euismod dui quam, id pulvinar erat pulvinar nec. Cras porttitor, magna non venenatis iaculis, arcu urna congue enim, vulputate gravida est sapien id leo.

        Sed dignissim convallis ex, id imperdiet arcu condimentum sed. Maecenas id dui tellus. Nunc sit amet pulvinar nibh. In eu urna sit amet sapien placerat pulvinar sit amet non ex. Vestibulum quis condimentum enim, non molestie orci. Vestibulum gravida auctor magna sit amet luctus. Proin vehicula diam magna, eu blandit magna molestie et. Fusce in mauris a odio varius lacinia in vel nisl. Nunc tincidunt dapibus nibh sed rutrum. Vivamus ornare leo tortor, ut porttitor lacus imperdiet nec.
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ url('/assets/js/owl.carousel.min.js') }}"></script>
    <script>

        $('.online').owlCarousel({
            loop:true,
            margin:10,
            nav:false,
            autoplay: false,
            autoplayTimeout: 2500,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        });


        $('.top-hot').owlCarousel({
            loop:true,
            margin:10,
            nav:false,
            autoplay: true,
            autoplayTimeout: 3500,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        });
    </script>
@endsection
