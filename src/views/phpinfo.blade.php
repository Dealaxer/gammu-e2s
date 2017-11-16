@extends('gammu-e2s::layouts.admin')

@section('pageTitle', trans('lang-e2s::routes.phpinfo'))

@section('content')
				<div class="content bg-image overflow-hidden" style="background-image: url('assets/img/photos/photo5@2x.jpg');">
                    <div class="push-50-t push-15">
                        <h1 class="h2 text-white animated zoomIn">{{trans('lang-e2s::routes.phpinfo')}}</h1>
                        <h2 class="h5 text-white-op animated zoomIn">{{trans('lang-e2s::routes.infophp')}}</h2>
                    </div>
                </div>
				
				<div class="content">
                    <div class="row">
                        <div id="phpinfo-pg" class="col-lg-12">
						{{phpinfo()}}
						</div>
					</div>
				</div>
@endsection
