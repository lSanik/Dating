<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin Template">
    <meta name="keywords" content="admin dashboard, admin, flat, flat ui, ui kit, app, web app, responsive">
    <link rel="shortcut icon" href="/asset/img/ico/favicon.png">
    <title>Login</title>

    <!-- Base Styles -->
    <link href="/asset/css/style.css" rel="stylesheet">
    <link href="/asset/css/style-responsive.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/asset/js/html5shiv.min.js"></script>
    <script src="/asset/js/respond.min.js"></script>
    <![endif]-->


</head>

<body class="login-body">

<div class="login-logo">
    <img src="/asset/img/logo.png" alt=""/>
</div>

<h2 class="form-heading">login</h2>
<div class="container log-row">
    <form class="form-signin" method="POST" role="form" action="{{ url('/login') }}">
        <div class="login-wrap">
            {!! csrf_field() !!}
            <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="User email" autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" placeholder="Password" name="password">
                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>

            <button class="btn btn-lg btn-success btn-block" type="submit"><i class="fa fa-btn fa-sign-in"></i> LOGIN</button>

            <label class="checkbox-custom check-success">
                <input type="checkbox" value="remember-me" id="checkbox1" name="remember"> <label for="checkbox1">Remember me</label>
                <a class="pull-right" data-toggle="modal" href="#forgotPass"> Forgot Password?</a>
            </label>


        </div>

        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="forgotPass" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Forgot Password ?</h4>
                    </div>
                    <div class="modal-body">
                        <p>Enter your e-mail address below to reset your password.</p>
                        <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                        <button class="btn btn-success" type="button">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->

    </form>
</div>


<!--jquery-1.10.2.min-->
<script src="/asset/js/jquery-1.11.1.min.js"></script>
<!--Bootstrap Js-->
<script src="/asset/js/bootstrap.min.js"></script>


</body>
</html>

