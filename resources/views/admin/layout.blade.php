<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="author" content="Mosaddek" />
    <meta name="keyword" content="slick, flat, dashboard, bootstrap, admin, template, theme, responsive, fluid, retina" />
    <meta name="description" content="" />
    <link rel="shortcut icon" href="javascript:;" type="image/png">

    <title>{{ trans('admin.dashboard') }}</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ url('/assets/css/default-theme.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/css/style.css') }}">

</head>
</head>
<body class="sticky-header">

    <section>
        @include('admin.blocks.sidebar-left')
                <!-- body content start-->
        <div class="body-content" >
            @include('admin.blocks.header-section')
        </div>

    </section>


    <!-- jQuery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- Latest compiled and minified JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Sidebar script -->
    <script src="{{url('/assets/js/scripts.js')}}"></script>
</body>
</html>