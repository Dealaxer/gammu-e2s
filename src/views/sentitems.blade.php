@extends('gammu-e2s::layouts.admin')

@section('pageTitle', trans('lang-e2s::routes.sentitems'))

@section('content')
				<div class="content bg-image overflow-hidden" style="background-image: url('assets/img/photos/photo5@2x.jpg');">
                    <div class="push-50-t push-15">
                        <h1 class="h2 text-white animated zoomIn">{{trans('lang-e2s::routes.sentitems')}}</h1>
                        <h2 class="h5 text-white-op animated zoomIn">{{trans('lang-e2s::routes.sentitems')}}</h2>
                    </div>
                </div>
				
				<div class="content">
					<div class="row">
                        <div class="col-lg-12">
                            <div class="block">
                                <div class="block-header">
                                    <h3 class="block-title"> {{trans('lang-e2s::routes.sentitems')}}</h3>
                                </div>
                                <div class="block-content">
									
									<table class="table table-bordered table-striped js-dataTable-full" role="grid" data-url-sms="sentitems">
										<thead>
											<tr>
												<th>
												<label class="css-input css-checkbox css-checkbox-primary">
													<input type="checkbox" id="master"><span></span> {{trans('lang-e2s::routes.all')}}
												</label>
												</th>
												<th>{{trans('lang-e2s::routes.id')}}</th>
												<th>{{trans('lang-e2s::routes.insintdb')}}</th>
												<th>{{trans('lang-e2s::routes.sendatetime')}}</th>
												<th>{{trans('lang-e2s::routes.deldatetime')}}</th>
												<th>{{trans('lang-e2s::routes.destinationnumber')}}</th>
												<th>{{trans('lang-e2s::routes.coding')}}</th>
												<th>{{trans('lang-e2s::routes.smscnumber')}}</th>
												<th>{{trans('lang-e2s::routes.message')}}</th>
												<th>{{trans('lang-e2s::routes.creatorid')}}</th>
												<th>{{trans('lang-e2s::routes.status')}}</th>
												<th>{{trans('lang-e2s::routes.actions')}}</th>
											</tr>
										</thead>
										<tbody>
										@foreach ($allsms as $sms)
											<tr id="tr_{{$sms->ID}}">
												<td>
													<label class="css-input css-checkbox css-checkbox-primary">
														<input type="checkbox" class="sub_chk" data-id="{{$sms->ID}}"><span></span>
													</label>
												</td>
												<td>{{$sms->ID}}</td>
												<td>{{$sms->InsertIntoDB}}</td>
												<td>{{$sms->SendingDateTime}}</td>
												<td>{{$sms->DeliveryDateTime}}</td>
												<td><span class="label label-primary">{{$sms->DestinationNumber}}</span></td>
												<td>{{$sms->Coding}}</td>
												<td>{{$sms->SMSCNumber}}</td>
												<td>{{$sms->TextDecoded}}</td>
												<td>{{$sms->CreatorID}}</td>
												<td><span class="label label-{{($sms->Status == 'SendingOKNoReport' ? 'success' : 'danger')}}">{{$sms->Status}}</span></td>
												<td class="text-center">
													<div class="btn-group">
															<button id="{{$sms->ID}}" data-page="sentitems" class="btn btn-xs btn-default rem-btn" type="button" title="Remove SMS"><i class="fa fa-times"></i></button>
													</div>
												</td>
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

