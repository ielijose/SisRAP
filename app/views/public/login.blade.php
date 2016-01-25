<!doctype html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <title>SisRAP</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!-- build:css(.) styles/vendor.css -->
    <!-- bower:css -->
    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <!-- endbower -->
    <!-- endbuild -->

    <!-- build:css(.tmp) styles/main.css -->
    <link rel="stylesheet" href="/app/styles/main.css">
    <link rel="stylesheet" href="/app/styles/sb-admin-2.css">
    <link rel="stylesheet" href="/app/styles/timeline.css">
    <link rel="stylesheet" href="/bower_components/metisMenu/dist/metisMenu.min.css">
    <link rel="stylesheet" href="/bower_components/angular-loading-bar/build/loading-bar.min.css">
    <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css" type="text/css">
    <!-- endbuild -->

    <!-- build:js(.) scripts/vendor.js -->
    <!-- bower:js -->
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/bower_components/angular/angular.min.js"></script>
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/bower_components/angular-ui-router/release/angular-ui-router.min.js"></script>
    <script src="/bower_components/json3/lib/json3.min.js"></script>
    <script src="/bower_components/oclazyload/dist/ocLazyLoad.min.js"></script>
    <script src="/bower_components/angular-loading-bar/build/loading-bar.min.js"></script>
    <script src="/bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js"></script>
    <script src="/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="/bower_components/Chart.js/Chart.min.js"></script>
    <!-- endbower -->
    <!-- endbuild -->

    <!-- build:js({.tmp,app}) scripts/scripts.js -->
        <script src="/app/scripts/app.js"></script>
        <script src="/app/js/sb-admin-2.js"></script>
    <!-- endbuild -->

    <!-- Custom CSS -->

    <!-- Custom Fonts -->

    <!-- Morris Charts CSS -->
    <!-- <link href="styles/morrisjs/morris.css" rel="stylesheet"> -->


    </head>

    <body>

    <div>

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <br>

                    @if(Session::has('alert'))
                        <div class="alert alert-{{ Session::get('alert.type') }} fade in">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Hey!</strong> {{ Session::get('alert.message') }}
                        </div>
                    @endif

                    @if($errors->all())
                    <div class="alert alert-danger ">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4>Error!</h4>
                        @foreach ($errors->all('<li>:message</li>') as $message)
                        {{ $message }}
                        @endforeach
                    </div>
                    <hr class="b-hr" />
                    @endif

                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="login" method="POST">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="username" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    </body>

</html>
