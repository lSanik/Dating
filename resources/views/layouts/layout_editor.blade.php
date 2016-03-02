<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title') - Laravel Medium editor demo on Codeforest</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('css/medium-editor.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="stylesheet" href="{{ url('css/themes/default.css') }}">
    <link rel="stylesheet" href="{{ url('css/medium-editor-insert.css') }}">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <style>
        table form { margin-bottom: 0; }
        form ul { margin-left: 0; list-style: none; }
        .error { color: red; font-style: italic; }
        body { padding-top: 20px; }
    </style>
</head>

<body>

<div class="container">
    @if (Session::has('message'))
        <div class="flash alert">
            <p>{{ Session::get('message') }}</p>
        </div>
    @endif

    @yield('main')
</div>
@include('layouts.editor')
</body>

</html>