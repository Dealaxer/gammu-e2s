@extends('gammu-e2s::layouts.admin')

@section('pageTitle', trans('lang-e2s::routes.users'))

@section('content')
				<div class="content bg-image overflow-hidden" style="background-image: url('assets/img/photos/photo5@2x.jpg');">
                    <div class="push-50-t push-15">
                        <h1 class="h2 text-white animated zoomIn">{{trans('lang-e2s::routes.users')}}</h1>
                        <h2 class="h5 text-white-op animated zoomIn">{{trans('lang-e2s::routes.userlist')}}</h2>
                    </div>
                </div>
				
				<div class="content">
					<div class="row">
                        <div class="col-lg-12">
                            <div class="block">
                                <div class="block-header">
                                    <h3 class="block-title"> {{trans('lang-e2s::routes.userlist')}}</h3>
                                </div>
                                <div class="block-content text-center">
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
									@if($errors->all())
									<div class="alert alert-danger alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h3 class="font-w300 push-15">{{trans('lang-e2s::routes.warning')}}</h3> 
										@foreach($errors->all() as $message)
											<p>{{ $message }}</p>
										@endforeach
									</div>
									@endif
									<table id="table-users" class="table table-bordered table-striped js-dataTable-phones">
										<thead>
											<tr>
												<th></th>
												<th>{{trans('lang-e2s::routes.id')}}</th>
												<th>{{trans('lang-e2s::routes.name')}}</th>
												<th>{{trans('lang-e2s::routes.email')}}</th>
												<th>{{trans('lang-e2s::routes.created')}}</th>
											</tr>
										</thead>
										<tbody>
										@foreach ($users as $user)
											<tr>
												<td><button class="btn btn-danger mrg10L" id="{{$user->id}}" title="{{trans('lang-e2s::routes.edit')}}" data-toggle="modal" data-target=".modal-user"><i class="si si-pencil"></i><div class="ripple-wrapper"></div></button></td>
												<td>{{$user->id}}</td>
												<td>{{$user->name}}</td>
												<td>{{$user->email}}</td>
												<td>{{$user->created_at}}</td>
											</tr>
										@endforeach
										</tbody>
									</table>
								
								</div>
                            </div>
                         
                        </div>
                    </div>
				</div>
				
				<div class="modal fade modal-user" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
						<form id="form-users" class="form-horizontal" method="post" action="">
								{{ csrf_field() }}
							<div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h4 class="modal-title">{{trans('lang-e2s::routes.user')}}</h4>
							</div>
							<div id="mdlbodyform" class="modal-body">

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">{{trans('lang-e2s::routes.close')}}<div class="ripple-wrapper"></div></button> 
								<button type="button" class="btn btn-primary" id="submitUForm">{{trans('lang-e2s::routes.save')}}</button>
							</div>
							</form>
						</div>
					</div>
				</div>
@endsection
