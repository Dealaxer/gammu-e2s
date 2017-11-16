<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus" lang="{{ app()->getLocale() }}"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus" lang="{{ app()->getLocale() }}"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Gammu-E2S - @yield('pageTitle')</title>

		<meta name="csrf-token" content="{{ csrf_token() }}">
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
		
		@if(Request::is('inbox','outbox','sentitems','phones'))
		<link rel="stylesheet" href="{{ asset('assets/css/datatables.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/responsive.bootstrap.min.css') }}">
		@endif

		<link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}">
		
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/e2s.css') }}">
		
		
    </head>
    <body>
	
		<div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
			@include('gammu-e2s::layouts.sidebar')
			@include('gammu-e2s::layouts.header')
			<main id="main-container">
			@yield('content')
			@include('gammu-e2s::layouts.footer')
			</main>
		</div>
		
		<div class="modal fade" id="apps-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-sm modal-dialog modal-dialog-top">
                <div class="modal-content">
                    <div class="block block-themed block-transparent">
                        <div class="block-header bg-primary-dark">
                            <ul class="block-options">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">{{trans('lang-e2s::routes.qmenu')}}</h3>
                        </div>
                        <div class="block-content">
                            <div class="row text-center">
                                <div class="col-xs-6">
                                    <a class="block block-rounded" href="/dashboard">
                                        <div class="block-content text-white bg-default">
                                            <i class="si si-speedometer fa-2x"></i>
                                            <div class="font-w600 push-15-t push-15">{{trans('lang-e2s::routes.dashboard')}}</div>
                                        </div>
                                    </a>
                                </div>
                                <!--<div class="col-xs-6">
                                    <a class="block block-rounded" href="#">
                                        <div class="block-content text-white bg-modern">
                                            <i class="si si-rocket fa-2x"></i>
                                            <div class="font-w600 push-15-t push-15">Frontend</div>
                                        </div>
                                    </a>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		<div class="modal fade" id="modal-compose-sms" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-popin">
                <div class="modal-content">
					<form id="cmp-sms" class="form-horizontal push-10-t" role="form">
                    <div id="block-over-sms" class="block block-themed block-transparent remove-margin-b">
                        <div class="block-header bg-primary-dark">
                            <ul class="block-options">
								<li>
									<button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo" id="refsms"></button>
								</li>
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">{{trans('lang-e2s::routes.composesms')}}</h3>
                        </div>
                        <div class="block-content">
                            <div class="form-group">
								<div class="col-xs-12">
									<label class="css-input css-radio css-radio-primary push-10-r">
										<input name="smstype" type="radio" value="1" checked="checked" class="rad1"><span></span> {{trans('lang-e2s::routes.smsnorm')}}
									</label>
									<label class="css-input css-radio css-radio-primary">
										<input name="smstype" type="radio" value="2" class="rad2"><span></span> {{trans('lang-e2s::routes.smsu')}}
									</label>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<div class="form-material">
										<input class="form-control" type="text" id="sendto" name="sendto" placeholder="{{trans('lang-e2s::routes.plsmsnumorussd')}}">
										<label for="sendto">{{trans('lang-e2s::routes.sendto')}}</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12">
									<div class="form-material">
										<textarea class="form-control" id="message-sms" name="message" rows="3" placeholder="{{trans('lang-e2s::routes.pladdmes')}}" maxlength="160"></textarea>
										<label for="message-sms">{{trans('lang-e2s::routes.smsmessage')}}</label>
									</div>
								</div>
							</div>
						</div>
                    </div>
                    <div class="modal-footer" id="footersms">
                        <button id="cancel-sms" class="btn btn-sm btn-default" type="button" data-dismiss="modal">{{trans('lang-e2s::routes.cancel')}}</button>
                        <button id="submit-sms" class="btn btn-sm btn-primary" type="submit"><i class="fa fa-paper-plane-o"></i> {{trans('lang-e2s::routes.sendm')}}</button>
                    </div>
					</form>
                </div>
            </div>
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

		<script src="{{ asset('assets/js/slick.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootbox.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.inputmask.min.js') }}"></script>
		@if(Request::is('dashboard'))
        <script src="{{ asset('assets/js/Chart.min.js') }}"></script>

        <script type="text/javascript">
			var Dashboard = function() {
				var initDashChartJS = function(){
					var $dashChartLinesCon  = jQuery('.js-dash-chartjs-lines')[0].getContext('2d');
					var $dashChartLines, $dashChartLinesData;
					
					var $dashChartLinesData = {
						labels: ["{{trans('lang-e2s::routes.mon')}}", "{{trans('lang-e2s::routes.tue')}}", "{{trans('lang-e2s::routes.wed')}}", "{{trans('lang-e2s::routes.thu')}}", "{{trans('lang-e2s::routes.fri')}}", "{{trans('lang-e2s::routes.sat')}}", "{{trans('lang-e2s::routes.sun')}}"],
						datasets: [
							{
								label: "{{trans('lang-e2s::routes.inbox')}}",
								fillColor: 'rgba(44, 52, 63, .07)',
								strokeColor: 'rgba(44, 52, 63, .25)',
								pointColor: 'rgba(44, 52, 63, .25)',
								pointStrokeColor: '#fff',
								pointHighlightFill: '#fff',
								pointHighlightStroke: 'rgba(44, 52, 63, 1)',
								data: [<?php 
									echo (isset($inbox_wd[1])? $inbox_wd[1]:'0');
									echo (isset($inbox_wd[2])? ', '.$inbox_wd[2]:', 0');
									echo (isset($inbox_wd[3])? ', '.$inbox_wd[3]:', 0');
									echo (isset($inbox_wd[4])? ', '.$inbox_wd[4]:', 0');
									echo (isset($inbox_wd[5])? ', '.$inbox_wd[5]:', 0');
									echo (isset($inbox_wd[6])? ', '.$inbox_wd[6]:', 0');
									echo (isset($inbox_wd[7])? ', '.$inbox_wd[7]:', 0'); 
								?>]
							},
							{
								label: "{{trans('lang-e2s::routes.sentitems')}}",
								fillColor: 'rgba(44, 52, 63, .1)',
								strokeColor: 'rgba(44, 52, 63, .55)',
								pointColor: 'rgba(44, 52, 63, .55)',
								pointStrokeColor: '#fff',
								pointHighlightFill: '#fff',
								pointHighlightStroke: 'rgba(44, 52, 63, 1)',
								data: [<?php 
									echo (isset($sent_wd[1])? $sent_wd[1]:'0');
									echo (isset($sent_wd[2])? ', '.$sent_wd[2]:', 0');
									echo (isset($sent_wd[3])? ', '.$sent_wd[3]:', 0');
									echo (isset($sent_wd[4])? ', '.$sent_wd[4]:', 0');
									echo (isset($sent_wd[5])? ', '.$sent_wd[5]:', 0');
									echo (isset($sent_wd[6])? ', '.$sent_wd[6]:', 0');
									echo (isset($sent_wd[7])? ', '.$sent_wd[7]:', 0'); 
								?>]
							}
						]
					};
					
					var option = {
						scaleFontFamily: "'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif",
						scaleFontColor: '#999',
						scaleFontStyle: '600',
						tooltipTitleFontFamily: "'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif",
						tooltipCornerRadius: 3,
						maintainAspectRatio: false,
						responsive: true
						
					};
					
					$dashChartLines = new Chart($dashChartLinesCon, {
						type: "line",
						data: $dashChartLinesData,
						options:option
					});
				};

				return {
					init: function () {
						initDashChartJS();
					}
				};
			}();
			jQuery(function(){ Dashboard.init(); });		
		</script>
		@endif
		@if(Request::is('logs'))
		<script type="text/javascript">
			$("#clearlog").click(function(e) {
				e.preventDefault();
				bootbox.confirm({
					message: "{{trans('lang-e2s::routes.clearlogconfirm')}}",
					buttons: {
						confirm: {
							label: "{{trans('lang-e2s::routes.yes')}}",
							className: 'btn-success'
						},
						cancel: {
							label: "{{trans('lang-e2s::routes.no')}}",
							className: 'btn-danger'
						}
					},
					callback: function (result) {
						if (result) {
							$("#logssmsd").submit();
						} else {
							console.log('Cancel');
						}
					}
				});
			});
		</script>
		@endif	
		@if(Request::is('smsd-settings'))
		<script type="text/javascript">
			$("#setchange").click(function(e) {
				e.preventDefault();
				bootbox.confirm({
					message: "{{trans('lang-e2s::routes.changesetconf')}}",
					buttons: {
						confirm: {
							label: "{{trans('lang-e2s::routes.yes')}}",
							className: 'btn-success'
						},
						cancel: {
							label: "{{trans('lang-e2s::routes.no')}}",
							className: 'btn-danger'
						}
					},
					callback: function (result) {
						if (result) {
							$("#setsmsd").submit();
						} else {
							console.log('Cancel');
						}
					}
				});
			});
		</script>
		@endif
		@if(Request::is('inbox','outbox','sentitems','phones'))
		<script src="{{ asset('assets/js/datatables.min.js') }}"></script>
		<script src="{{ asset('assets/js/dataTables.responsive.min.js') }}"></script>	
		<script src="{{ asset('assets/js/datatables.js') }}"></script>
		<script type="text/javascript">
		//$(document).ready(function () {
			
			$('#master').on('click', function(e) {
				if($(this).is(':checked',true)){
					$(".sub_chk").prop('checked', true);  
				} else {  
					$(".sub_chk").prop('checked',false);  
				}  
			});
			
			setTimeout(function(){
				$('.delete_all').text("{{trans('lang-e2s::routes.delallrows')}}")
			}, 100);
			
			$('.block-content').on('click', '.delete_all',function(e) {
				var allVals = [];  
				$(".sub_chk:checked").each(function() {  
					allVals.push($(this).attr('data-id'));
				});  
				if(allVals.length <=0)  
				{  
					bootbox.alert({
						message: "{{trans('lang-e2s::routes.alertselrow')}}"
					});		
				}  else {  
					bootbox.confirm({
						message: "{{trans('lang-e2s::routes.confirmdelrow')}}",
						buttons: {
							confirm: {
								label: "{{trans('lang-e2s::routes.yes')}}",
								className: 'btn-success'
							},
							cancel: {
								label: "{{trans('lang-e2s::routes.no')}}",
								className: 'btn-danger'
							}
						},
						callback: function (result) {
							if (result) {
								var join_selected_values = allVals.join(","); 
								var url_del = $('.js-dataTable-full').attr('data-url-sms')+"DeleteAll";
								$.ajax({
									url: url_del,
									type: 'get',
									headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
									data: 'ids='+join_selected_values,
									success: function (data) {
										if (data['success']) {
											$(".sub_chk:checked").each(function() {  
												$(this).parents("tr").remove();
											});
											bootbox.alert({
												message: ""+data['success']+""
											});
										} else if (data['error']) {
											bootbox.alert({
												message: ""+data['error']+""
											});
										} else {
											bootbox.alert({
												message: "{{trans('lang-e2s::routes.alertwoops')}}"
											});
										}
									},
									error: function (data) {
										bootbox.alert({
												message: ""+data.responseText+""
										});
									}
								});
								$.each(allVals, function( index, value ) {
									$('table tr').filter("[data-row-id='" + value + "']").remove();
								});
							}
							console.log('Check result: ' + result);
						}
					}); 
				}  
			});
			
			$(".rem-btn").on('click',(function(e){
				var id_item = $(this).closest(".rem-btn").attr('id');
				var name_page = $(this).closest(".rem-btn").attr('data-page');
				var url_a = name_page+"/delete/"+id_item;
				e.preventDefault();
				bootbox.confirm({
					message: "{{trans('lang-e2s::routes.performdel')}}",
					buttons: {
						confirm: {
							label: "{{trans('lang-e2s::routes.yes')}}",
							className: 'btn-success'
						},
						cancel: {
							label: "{{trans('lang-e2s::routes.no')}}",
							className: 'btn-danger'
						}
					},
					callback: function (result) {
						if (result) {
							success(url_a);
						} else {
							console.log('Close Form');
						}
					}
				});
			}));
			
			function success(url_a) {
				$.ajax({
					type: 'get',
					url: url_a,
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					success: function(data) {
						bootbox.alert({
							message: "{{trans('lang-e2s::routes.sucdel')}}"
						});
						$("#" + data['tr']).slideUp("slow");
						
					},
					error: function(xhr, str) {
						bootbox.dialog({
							message: "{{trans('lang-e2s::routes.errdel')}}",
							title: "Error!",
							buttons: {
								main: {
									label: "{{trans('lang-e2s::routes.close')}}",
									className: "btn-default"
								}
							}
						});
					}
				});	
				return false;		
			}
		//});
		</script>
		@endif
		@if(Request::is('users'))
		<script type="text/javascript">
			var id;
			$('[data-target=".modal-user"]').click(function(){ id = this.id; 
				$('#form-users').attr('action','/users/update/'+id);
				$.get('/users/edit/'+id, function(data) {
					$('#mdlbodyform').html(data);
				});	
			});
			$("#submitUForm").on('click', function() {
				$("#form-users").submit();
			});
		</script>
		@endif
		
		<script>
            jQuery(function () {
                App.initHelpers('slick');
            });
        </script>
		
		<script type="text/javascript">
			if ($('.rad1').is(':checked')) {
				$("#message-sms").prop('disabled', false);
				$('#sendto').inputmask('+[9]99999999999');
			}
			if ($('.rad2').is(':checked')) {
				$("#message-sms").prop('disabled', true);
				$('#sendto').inputmask("*999#", {
				  definitions: {
					"#": {
					  validator: "[#]"
					},
					"*": {
					  validator: "[*]"
					}
				  },
				  "placeholder": "*999#"
				});
			}
		
			$('.rad1').on('click',function(){
				$("#message-sms").prop('disabled', false);
				$('#sendto').inputmask('+[9]99999999999');
			});
			$('.rad2').on('click',function(){
				$("#message-sms").prop('disabled', true);

				$('#sendto').inputmask("*999#", {
				  definitions: {
					"#": {
					  validator: "[#]"
					},
					"*": {
					  validator: "[*]"
					}
				  },
				  "placeholder": "*999#"
				});
			});
			
			$('#smstypecheck input:radio').click(function () {
				if ($(this).attr('checked')) {
					alert('is checked');
				} else {
					alert('is not checked');
				}
			});
			
			$("#cmp-sms").submit(function(e){
				e.preventDefault();
				
				var smstype = $("input[name='smstype']:checked").val();
				var sendto = $("#sendto").val();
				var messagesms = $("#message-sms").val();
				var textmes = "";
				
				bootbox.confirm({
					message: "{{trans('lang-e2s::routes.wantsms')}}",
					buttons: {
						confirm: {
							label: "{{trans('lang-e2s::routes.yes')}}",
							className: 'btn-success'
						},
						cancel: {
							label: "{{trans('lang-e2s::routes.no')}}",
							className: 'btn-danger'
						}
					},
					callback: function (result) {
						if (result) {
							$('#block-over-sms').addClass('block-opt-refresh');
							$('#cancel-sms').prop('disabled',true);
							$('#submit-sms').prop('disabled',true);
							if ($('.rad1').is(':checked')) {
								textmes = "{{trans('lang-e2s::routes.sendmes')}}";
							} else {
								textmes = "{{trans('lang-e2s::routes.getsms')}}";
							}	
							$('#footersms').prepend('<div class="pull-left" id="load-sms">'+textmes+' <span class="timer"></span></div>');
							start_time();
							compose(smstype,sendto,messagesms);
						} else {
							console.log('Cancel');
						}
					}
				});
				
				
			});
			
			function compose(smstype,sendto,messagesms) {
				$.ajax({
					type: 'post',
					url: "{{route('compose-sms')}}",
					dataType: 'JSON',
					data: {"_token": "{{csrf_token()}}",smstype:smstype,sendto:sendto,messagesms:messagesms},
					success: function(data) {
						$('#block-over-sms').removeClass('block-opt-refresh');
						$('#cancel-sms').prop('disabled',false);
						$('#submit-sms').prop('disabled',false);
						clearInterval(start_time_interval);
						$("#load-sms").remove();
						$('#modal-compose-sms').trigger('click');
						bootbox.dialog({
							message: ""+data.text+"",
							title: "{{trans('lang-e2s::routes.smsmessage')}}",
							buttons: {
								main: {
									label: "{{trans('lang-e2s::routes.close')}}",
									className: "btn-default"
								}
							}
						});
						
					},
					error: function(xhr, str) {
						bootbox.dialog({
							message: "{{trans('lang-e2s::routes.errsend')}}",
							title: "Error!",
							buttons: {
								main: {
									label: "{{trans('lang-e2s::routes.close')}}",
									className: "btn-default"
								}
							}
						});
					}
				});	
				return false;
			
			}
			
			function start_time() {
				$('.timer').text('00:00:00')
				var this_date = new Date();
				//clearInterval(start_time_interval);
				start_time_interval = setInterval(function(){
				  var new_date = new Date() - this_date;
				  var sec   = Math.abs(Math.floor(new_date/1000)%60); //sek
				  var min   = Math.abs(Math.floor(new_date/1000/60)%60); //min
				  var hours = Math.abs(Math.floor(new_date/1000/60/60)%24); //hours
				  if (sec.toString().length   == 1) sec   = '0' + sec;
				  if (min.toString().length   == 1) min   = '0' + min;
				  if (hours.toString().length == 1) hours = '0' + hours;
				  $('.timer').text(hours + ':' + min + ':' + sec);
				},100);
			}
		</script>
    </body>
</html>