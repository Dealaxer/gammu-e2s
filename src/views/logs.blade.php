@extends('gammu-e2s::layouts.admin')

@section('pageTitle', trans('lang-e2s::routes.logs'))

@section('content')
				<div class="content bg-image overflow-hidden" style="background-image: url('assets/img/photos/photo5@2x.jpg');">
                    <div class="push-50-t push-15">
                        <h1 class="h2 text-white animated zoomIn">{{trans('lang-e2s::routes.logs')}}</h1>
                        <h2 class="h5 text-white-op animated zoomIn">Gammu SMSD</h2>
                    </div>
                </div>
				
				<div class="content">
					<div class="row">
                        <div class="col-lg-12">
                            <div class="block">
                                <div class="block-header">
                                    <h3 class="block-title"> {{trans('lang-e2s::routes.logs')}} Gammu SMSD</h3>
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
								<form class="form-horizontal" action="{{route('destroylogs')}}" method="post" id="logssmsd">
									{{csrf_field()}}
									<div class="form-group">
										<div class="col-md-12">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-file-text-o"></i></span>
												<input class="form-control" id="example-input1-group1" name="example-input1-group1" placeholder="{{trans('lang-e2s::routes.logpath')}}" type="text" value="/var/log/gammu-smsd">
												<span class="input-group-addon">
													{{trans('lang-e2s::routes.perm')}}<?php echo substr(sprintf('%o', fileperms('/var/log/gammu-smsd')), -3); ?>
												</span>
											</div>
										</div>
									</div>
									@if (substr(sprintf('%o', fileperms('/var/log/gammu-smsd')), -3) == 644)
									<div class="form-group">
										<div class="col-md-12">
											<p class="content-mini content-mini-full bg-danger" style="color:white;"><i>{{trans('lang-e2s::routes.loginfo')}}</i></p>
										</div>
									</div>
									@endif
									<div class="form-group">
										<label class="col-xs-12" for="example-textarea-input">SMSD {{trans('lang-e2s::routes.logs')}}</label>
										<div class="col-xs-12">
										<?php $log = file_get_contents('/var/log/gammu-smsd');?>
											<textarea class="form-control" id="example-textarea-input" name="example-textarea-input" rows="22" placeholder="{{trans('lang-e2s::routes.logs')}}...">{{$log}}</textarea>
										</div>
									</div>
									
									<div class="form-group">
										<div class="col-xs-12">
											<button class="btn btn-sm btn-primary" type="button" id="clearlog">{{trans('lang-e2s::routes.clearlog')}}</button>
										</div>
									</div>
								</form>
								</div>
                            </div>
                         
                        </div>
                    </div>
				</div>
@endsection
