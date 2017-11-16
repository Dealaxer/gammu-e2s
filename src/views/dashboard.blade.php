@extends('gammu-e2s::layouts.admin')

@section('pageTitle', trans('lang-e2s::routes.dashboard'))

@section('content')
				<div class="content bg-image overflow-hidden" style="background-image: url('assets/img/photos/photo3@2x.jpg');">
                    <div class="push-50-t push-15">
                        <h1 class="h2 text-white animated zoomIn">{{trans('lang-e2s::routes.dashboard')}}</h1>
                        <h2 class="h5 text-white-op animated zoomIn">{{trans('lang-e2s::routes.weladmin')}}</h2>
                    </div>
                </div>
				
				<div class="content">
					<div class="row">
						<div class="col-lg-12">
                            <!-- Main Dashboard Chart -->
                            <div class="block">
                                <div class="block-header">
                                    <h3 class="block-title">{{trans('lang-e2s::routes.overviewsms')}}</h3>
                                </div>
                                <div class="block-content block-content-full bg-gray-lighter text-center">
                                    <div style="height: 374px;"><canvas class="js-dash-chartjs-lines" height="374"></canvas></div>
                                </div>
                            </div>
                        </div>
					
					
                        <div class="col-lg-12">
                            <div class="block">
                                <div class="block-header">
                                    <h3 class="block-title"> {{trans('lang-e2s::routes.sysinfo')}}</h3>
                                </div>
                                <div class="block-content bg-gray-lighter">
								<div class="table-responsive">
									<table class="table table-striped table-vcenter">
										<tbody>
											<tr>
												<td>{{trans('lang-e2s::routes.os')}}</td>
												<td class="">
													<span class="label label-success">{{php_uname()}}</span>
												</td>
											</tr>
											
											<tr>
												<td>{{trans('lang-e2s::routes.lv')}}</td>
												<td class="">
													<span class="label label-info">{{$LV}}</span>
												</td>
											</tr>
											
											<tr>
												<td>{{trans('lang-e2s::routes.gv')}}</td>
												<td class="">
													<span class="label label-info">{{$GV}}</span>
												</td>
											</tr>
											
											<tr>
												<td>{{trans('lang-e2s::routes.gdbv')}}</td>
												<td class="">
													<span class="label label-info">{{$GDBV->Version}}</span>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
                                </div>
                            </div>
                         
                        </div>
                    </div>

				</div>
@endsection
