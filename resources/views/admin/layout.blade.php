<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="_token" value="{{ csrf_token() }}">
    <meta name="author" content="Mosaddek" />
    <meta name="keyword" content="slick, flat, dashboard, bootstrap, admin, template, theme, responsive, fluid, retina" />
    <meta name="description" content="" />
    <link rel="shortcut icon" href="javascript:;" type="image/png">

    <title>{{ trans('admin.dashboard') }}</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!--link rel="stylesheet" href="{{ url('/assets/css/bootstrap.min.css') }}" -->
    <link rel="stylesheet" href="{{ url('/assets/css/font-awesome.css') }}">

    <link rel="stylesheet" href="{{ url('/assets/css/default-theme.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/css/style.css') }}">

    <style>
        .nav-divider{
            background-color: #8a8a71 !important;
        }

        form .response{
            margin-top: 20px;
        }

        .response > span {
            padding: 10px;
        }
    </style>
    @yield('styles')

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ url('/assets/js/html5shiv.js') }}"></script>
    <script src="{{ url('/assets/js/respond.min.js') }}"></script>
    <![endif]-->


</head>
<body class="sticky-header">

    <section>
        @include('admin.blocks.sidebar-left')
                <!-- body content start-->
        <div class="body-content" >
            @include('admin.blocks.header-section')

            <div class="page-head">
                <h3 class="m-b-less">
                    {{ $heading }}
                </h3>
            </div>

            @include('admin.blocks.flash-error')
            @include('admin.blocks.flash-success')

            <div class="wrapper">
                @yield('content')
            </div>
        </div>

    </section>

    <div class="modal fade" id="check" tabindex="-1" role="dialog" aria-labelledby="checkLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="checkLabel"> Проверить анкету по номеру паспорта</h4>
                </div>
                {!! Form::open(['class' => 'form-inline text-center', 'id' => 'checkPass']) !!}
                    <div class="modal-body">

                            <div class="form-group">
                                {!! Form::label('passno', 'Паспорт (серия номер): ') !!}
                                {!! Form::text('passno', 'SN 123352',['class' => 'form-control', ]) !!}
                            </div>
                            <div class="response" style="display: none">

                            </div>

                    </div>
                    <div class="modal-footer">
                        {!! Form::submit('Проверить', ['class' => 'btn btn-success']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- Latest compiled and minified JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Sidebar script -->
    <script src="{{url('/assets/js/scripts.js')}}"></script>


    <script src="{{ url('/assets/js/modernizr.min.js') }}"></script>
    <!-- script src="{{ url('/assets/js/jquery.nicescroll.js') }}"></script -->
    <!-- script src="{{url('/assets/js/scripts.js')}}"></script-->

    <script>
        $(document).ready(function(){
            
            /**
             * Check passport
             */

            $('form#checkPass').on('submit', function(e){
                e.preventDefault();


                $.ajax({
                    type: 'POST',
                    url: '{{ route('check_pass') }}',
                    data: { passno: $('#checkPass input[name="passno"]').val(), _token: $('#checkPass input[name="_token"]').val()},
                    success: function( response ){
                        $('form .response').empty();
                        $('form .response').append( response).css('display', 'block');

                    },
                    error: function( response ){
                        $('form .response').empty();
                        $('form .response').append( response ).css('display', 'block');
                    }

                });

            });
        });
    </script>


    <?php /*


    <script src="{{ url('/assets/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ url('/assets/js/bootstrap.min.js') }}"></script>


*/ ?>
    @yield('scripts')

    <script>


        $(document).ready(function(){
            /**
             * Active menu
             */
            var url = window.location;

            $('.nav a').each(function(){
                // if the current path is like this link, make it active
                if($(this).attr('href').indexOf(url) !== -1){
                    $(this).parent().addClass('active');
                    $(this).closest('.menu-list').addClass('nav-active');
                }
            });


        });

    </script>
</body>
</html>