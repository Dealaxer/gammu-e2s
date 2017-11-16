@extends('gammu-e2s::layouts.admin')

@section('pageTitle', 'Cron')

@section('content')
				<div class="content bg-image overflow-hidden" style="background-image: url('assets/img/photos/photo3@2x.jpg');">
                    <div class="push-50-t push-15">
                        <h1 class="h2 text-white animated zoomIn">Cron</h1>
                        <h2 class="h5 text-white-op animated zoomIn">Cron List</h2>
                    </div>
                </div>
				
				<div class="content">
					<div class="row">
                        <div class="col-lg-12">
                            <div class="block">
                                <div class="block-header">
                                    <h3 class="block-title"> Cron List</h3>
                                </div>
                                <div class="block-content">
								@if(Session::has('success'))
								<div class="alert alert-success alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<h3 class="font-w300 push-15">Success</h3> 
								<p>{{ Session::get('success') }}</p>
								</div>
								@endif
								@if(Session::has('danger'))
								<div class="alert alert-danger alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<h3 class="font-w300 push-15">Danger</h3> 
								<p>{{ Session::get('danger') }}</p>
								</div>
								@endif	
								<form class="form-horizontal" action="" method="post" id="crontab">
									{{csrf_field()}}
									<div class="form-group">
										<div class="col-md-12">
											<div class="input-group">
												<span class="input-group-addon">COMMAND</span>
												<input class="form-control" id="example-input1-group1" name="example-input1-group1" placeholder="Log path" type="text" value="crontab -e">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-xs-12" for="example-textarea-input">Cron List Jobs of ROOT</label>
										<div class="col-xs-12">
											<textarea class="form-control" id="example-textarea-input" name="example-textarea-input" rows="22" placeholder="Tasks..."></textarea>
										</div>
									</div>
									
									<!--<div class="form-group">
										<div class="col-xs-12">
											<button class="btn btn-sm btn-primary" type="button" id="clearlog">Save Cron</button>
										</div>
									</div> -->
								</form>
								</div>
                            </div>
                         
                        </div>
                    </div>
				</div>
@endsection
