<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus" lang="{{ app()->getLocale() }}"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus" lang="{{ app()->getLocale() }}"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Gammu-E2S - Reset Password</title>

        <meta name="description" content="Gammu-E2S - Web Interface">
        <meta name="author" content="dealaxer">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="shortcut icon" href="{{ asset('assets/img/favicons/favicon.png') }}">

        <link rel="icon" type="image/png" href="{{ asset('assets/img/favicons/favicon-16x16.png') }}" sizes="16x16">
        <link rel="icon" type="image/png" href="{{ asset('assets/img/favicons/favicon-32x32.png') }}" sizes="32x32">
        <link rel="icon" type="image/png" href="{{ asset('assets/img/favicons/favicon-96x96.png') }}" sizes="96x96">
        <link rel="icon" type="image/png" href="{{ asset('assets/img/favicons/favicon-160x160.png') }}" sizes="160x160">
        <link rel="icon" type="image/png" href="{{ asset('assets/img/favicons/favicon-192x192.png') }}" sizes="192x192">

        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/img/favicons/apple-touch-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/img/favicons/apple-touch-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/img/favicons/apple-touch-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/favicons/apple-touch-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/img/favicons/apple-touch-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/img/favicons/apple-touch-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/img/favicons/apple-touch-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/img/favicons/apple-touch-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-touch-icon-180x180.png') }}">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Source+Sans+Pro:300,400,400i,600,700&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/e2s.css') }}">
    </head>
    <body>

        <div class="bg-white pulldown">
            <div class="content content-boxed overflow-hidden">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                        <div class="push-30-t push-50 animated fadeIn">

                            <div class="text-center">
                                <img src="{{ asset('assets/img/favicons/apple-touch-icon-60x60.png') }}">
                                <h1 class="h3 push-10-t">Reset Password</h1>
                            </div>

                            <form class="js-validation-login form-horizontal push-30-t" action="{{ route('password.request') }}" method="post">
							{{ csrf_field() }}

								<input type="hidden" name="token" value="{{ $token }}">
							
							
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <div class="col-xs-12">
                                        <div class="form-material form-material-primary floating">
                                            <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
                                            <label for="email">E-Mail Address</label>
                                        </div>
										@if ($errors->has('email'))
											<span class="help-block">
												<strong>{{ $errors->first('email') }}</strong>
											</span>
										@endif
                                    </div>
                                </div>
								
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <div class="col-xs-12">
                                        <div class="form-material form-material-primary floating">
                                            <input class="form-control" type="password" id="password" name="password" required>
                                            <label for="password">Password</label>
                                        </div>
										@if ($errors->has('password'))
											<span class="help-block">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
										@endif
                                    </div>
                                </div>
								
								<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <div class="col-xs-12">
                                        <div class="form-material form-material-primary floating">
                                            <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required>
                                            <label for="password_confirmation">Confirm Password</label>
                                        </div>
										@if ($errors->has('password_confirmation'))
											<span class="help-block">
												<strong>{{ $errors->first('password_confirmation') }}</strong>
											</span>
										@endif
                                    </div>
                                </div>

                                <div class="form-group push-30-t">
                                    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                                        <button class="btn btn-sm btn-block btn-primary" type="submit">Reset Password</button>
                                    </div>
                                </div>
                            </form>
							
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pulldown push-30-t text-center animated fadeInUp">
            <small class="text-muted"><span class="js-year-copy"></span> &copy; Gammu-E2S v.1.0.0</small>
        </div>
		

        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery-scrollLock.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.appear.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.countTo.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.placeholder.min.js') }}"></script>
        <script src="{{ asset('assets/js/js.cookie.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>

        <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('assets/js/register.js') }}"></script>
    </body>
</html>