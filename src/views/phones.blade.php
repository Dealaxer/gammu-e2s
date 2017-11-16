@extends('gammu-e2s::layouts.admin')

@section('pageTitle', trans('lang-e2s::routes.phones'))

@section('content')
				<div class="content bg-image overflow-hidden" style="background-image: url('assets/img/photos/photo5@2x.jpg');">
                    <div class="push-50-t push-15">
                        <h1 class="h2 text-white animated zoomIn">{{trans('lang-e2s::routes.phones')}}</h1>
                        <h2 class="h5 text-white-op animated zoomIn">{{trans('lang-e2s::routes.phonedev')}}</h2>
                    </div>
                </div>
				
				<div class="content">
					<div class="row">
                        <div class="col-lg-12">
                            <div class="block">
                                <div class="block-header">
                                    <h3 class="block-title"> {{trans('lang-e2s::routes.phonedev')}}</h3>
                                </div>
                                <div class="block-content">
									<table class="table table-bordered table-striped js-dataTable-phones">
										<thead>
											<tr>
												<th>{{trans('lang-e2s::routes.id')}}</th>
												<th>{{trans('lang-e2s::routes.updindb')}}</th>
												<th>{{trans('lang-e2s::routes.insintdb')}}</th>
												<th>{{trans('lang-e2s::routes.timeout')}}</th>
												<th>{{trans('lang-e2s::routes.send')}}</th>
												<th>{{trans('lang-e2s::routes.receive')}}</th>
												<th>{{trans('lang-e2s::routes.imei')}}</th>
												<th>{{trans('lang-e2s::routes.imsi')}}</th>
												<th>{{trans('lang-e2s::routes.netcode')}}</th>
												<th>{{trans('lang-e2s::routes.netname')}}</th>
												<th>{{trans('lang-e2s::routes.battery')}}</th>
												<th>{{trans('lang-e2s::routes.signal')}}</th>
												<th>{{trans('lang-e2s::routes.sent')}}</th>
												<th>{{trans('lang-e2s::routes.received')}}</th>
												<th>{{trans('lang-e2s::routes.client')}}</th>
											</tr>
										</thead>
										<tbody>
										@foreach ($devices as $dev)
											<tr>
												<td>{{$dev->ID}}</td>
												<td>{{$dev->UpdatedInDB}}</td>
												<td>{{$dev->InsertIntoDB}}</td>
												<td>{{$dev->TimeOut}}</td>
												<td>{{$dev->Send}}</td>
												<td>{{$dev->Receive}}</td>
												<td>{{$dev->IMEI}}</td>
												<td>{{$dev->IMSI}}</td>
												<td>{{$dev->NetCode}}</td>
												<td><span class="label label-primary">{{$dev->NetName}}</span></td>
												<td>{{$dev->Battery}}</td>
												<td>{{$dev->Signal}}</td>
												<td>{{$dev->Sent}}</td>
												<td>{{$dev->Received}}</td>
												<td>{{$dev->Client}}</td>
											</tr>
										@endforeach
										</tbody>
									</table>
                                </div>
                            </div>
                         
                        </div>
                    </div>
				</div>
@endsection
