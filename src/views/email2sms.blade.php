@extends('gammu-e2s::layouts.admin')

@section('pageTitle', trans('lang-e2s::routes.e2s'))

@section('content')
				<div class="content bg-image overflow-hidden" style="background-image: url('assets/img/photos/photo5@2x.jpg');">
                    <div class="push-50-t push-15">
                        <h1 class="h2 text-white animated zoomIn">{{trans('lang-e2s::routes.e2s')}}</h1>
                        <h2 class="h5 text-white-op animated zoomIn">{{trans('lang-e2s::routes.e2s')}}</h2>
                    </div>
                </div>
				
				<div class="content">
					<div class="row">
                        <div class="col-lg-4">
                            <div class="block">
                                <div class="block-header">
                                    <h3 class="block-title"> {{trans('lang-e2s::routes.e2s')}}</h3>
                                </div>
                                <div class="block-content">
									@if(Session::has('success'))
									<div class="alert alert-success alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h3 class="font-w300 push-15">{{trans('lang-e2s::routes.success')}}</h3> 
									<p>{{ Session::get('success') }}</p>
									</div>
									@endif
									@if(Session::has('danger'))
									<div class="alert alert-danger alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h3 class="font-w300 push-15">{{trans('lang-e2s::routes.danger')}}</h3> 
									<p>{{ Session::get('danger') }}</p>
									</div>
									@endif
								<form method="post" action="{{ route('enablesms') }}">
								{!! csrf_field() !!}
									<div class="row items-push">
										<div class="col-xs-12">
											<label class="css-input switch switch-lg switch-primary">
												<input type="checkbox" onChange="this.form.submit()" value="yes" <?php echo ($e2s && $e2s->mode == 1 ? 'checked="checked"' : '');?> name="mode"><span></span> {{trans('lang-e2s::routes.e2sem')}}
											</label>
										</div>
									</div>
								</form>	

								@if($e2s && $e2s->mode == 1)
									<form class="form-horizontal" action="{{route('savesms')}}" method="post" id="e2sms">
										{{csrf_field()}}
										<div class="form-group">
											<div class="col-md-12">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-link"></i></span>
													<input class="form-control" id="url" name="url" placeholder="URL IMAP, EXAMPLE: imap.google.com" value="{{$e2s->url}}" type="text" required>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-retweet"></i></span>
													<input class="form-control" id="port" name="port" placeholder="PORT IMAP, EXAMPLE: 465" value="{{$e2s->port}}" type="text" required>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-user"></i>&nbsp;</span>
													<input class="form-control" id="username" name="username" placeholder="USER NAME, EXAMPLE: username@gmail.com" value="{{$e2s->username}}" type="text" required>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-user"></i>&nbsp;</span>
													<input class="form-control" id="password" name="password" placeholder="PASSWORD" type="text" value="{{$e2s->password}}" required>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12">
												<button class="btn btn-minw btn-primary" type="submit">{{trans('lang-e2s::routes.save')}}</button>
											</div>
										</div>
									</form>
								@endif								
								</div>
                            </div>
                         
                        </div>
						<div class="col-lg-4">
                            <div class="block">
                                <div class="block-header">
                                    <h3 class="block-title"> {{trans('lang-e2s::routes.recmailon')}}</h3>
                                </div>
                                <div class="block-content">
									@if(Session::has('success2'))
									<div class="alert alert-success alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h3 class="font-w300 push-15">{{trans('lang-e2s::routes.success')}}</h3> 
									<p>{{ Session::get('success2') }}</p>
									</div>
									@endif
									@if(Session::has('danger2'))
									<div class="alert alert-danger alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h3 class="font-w300 push-15">{{trans('lang-e2s::routes.danger')}}</h3> 
									<p>{{ Session::get('danger2') }}</p>
									</div>
									@endif
								<form method="post" action="{{ route('enableoneemail') }}">
								{!! csrf_field() !!}
									<div class="row items-push">
										<div class="col-xs-12">
											<label class="css-input switch switch-lg switch-primary">
												<input type="checkbox" onChange="this.form.submit()" value="yes" <?php echo ($e2s && $e2s->onlyemail == 1 ? 'checked="checked"' : '');?> name="mode2"><span></span> {{trans('lang-e2s::routes.e2soe')}}
											</label>
										</div>
									</div>
								</form>	

								@if($e2s && $e2s->onlyemail == 1)
									<form class="form-horizontal" action="{{route('saveoneemail')}}" method="post" id="e2s-email">
										{{csrf_field()}}
										<div class="form-group">
											<div class="col-md-12">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
													<input class="form-control" id="email" name="email" placeholder="EMAIL, EXAMPLE: username@gmail.com" value="{{$e2s->email}}" type="text" required>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12">
												<button class="btn btn-minw btn-primary" type="submit">{{trans('lang-e2s::routes.save')}}</button>
											</div>
										</div>
									</form>
								@endif								
								</div>
                            </div>
                         
                        </div>
						@if($e2s && $e2s->mode == 1)
						<div class="col-lg-4">
							<p class="content-mini content-mini-full bg-info" style="color:white;">{{trans('lang-e2s::routes.croncommand')}}<br><br>
							<i>crontab -e</i><br><br>
							<i>* * * * * /usr/bin/curl {{ url('/') }}/email2sms/execute > /var/log/e2s-log 2>&1</i>
							</p>
						</div>
						@endif
						@if($e2s && $e2s->mode == 1)
						<div class="col-lg-12">
						<div class="block">
                                <div class="block-header">
                                    <h3 class="block-title"> E2S {{trans('lang-e2s::routes.logs')}}</h3>
                                </div>
                                <div class="block-content">
							<form class="form-horizontal">
								<div class="form-group">
									<div class="col-xs-12">
									<?php $log = file_get_contents('/var/log/e2s-log');?>
										<textarea class="form-control" id="example-textarea-input" name="example-textarea-input" rows="22" placeholder="{{trans('lang-e2s::routes.logs')}}...">{{$log}}</textarea>
									</div>
								</div>
							</form>
							</div>
						</div>
						</div>
						@endif
                    </div>
				</div>
@endsection
