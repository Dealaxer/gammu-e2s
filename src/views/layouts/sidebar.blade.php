			<nav id="sidebar">
                <div id="sidebar-scroll">
                    <div class="sidebar-content">
                        <div class="side-header side-content bg-white-op">
                            <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
                                <i class="fa fa-times"></i>
                            </button>
                            <a class="h5 text-white" href="/dashboard">
                                 <span class="h4 font-w600 sidebar-mini-hide hd-lg-e2s">Gammu</span> <img src="{{ asset('assets/img/favicons/gammu-e2s_logo.png') }}">
                            </a>
                        </div>
                        <div class="side-content">
                            <ul class="nav-main">
                                <li>
                                    <a class="{{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard"><i class="si si-speedometer"></i><span class="sidebar-mini-hide">{{trans('lang-e2s::routes.dashboard')}}</span></a>
                                </li>
                                <li class="nav-main-heading"><span class="sidebar-mini-hide">{{trans('lang-e2s::routes.smsdint')}}</span></li>
								<li>
                                    <a data-toggle="modal" data-target="#modal-compose-sms" class="compose-sms"><i class="si si-speech"></i><span class="sidebar-mini-hide">{{trans('lang-e2s::routes.composesms')}}</span></a>  
                                </li>
                                <li>
                                    <a class="{{ Request::is('inbox') ? 'active' : '' }}" href="/inbox"><i class="si si-envelope-open"></i><span class="sidebar-mini-hide">{{trans('lang-e2s::routes.inbox')}}</span></a>  
                                </li>
								<li>
                                    <a class="{{ Request::is('outbox') ? 'active' : '' }}" href="/outbox"><i class="si si-envelope"></i><span class="sidebar-mini-hide">{{trans('lang-e2s::routes.outbox')}}</span></a>  
                                </li>
                                <li>
                                    <a class="{{ Request::is('sentitems') ? 'active' : '' }}" href="/sentitems"><i class="si si-paper-plane"></i><span class="sidebar-mini-hide">{{trans('lang-e2s::routes.sentitems')}}</span></a>  
                                </li>
								<li class="nav-main-heading"><span class="sidebar-mini-hide">{{trans('lang-e2s::routes.smsdset')}}</span></li>
								<li>
                                    <a class="{{ Request::is('email2sms') ? 'active' : '' }}" href="/email2sms"><i class="si si-bubbles"></i><span class="sidebar-mini-hide">{{trans('lang-e2s::routes.e2s')}}</span></a>  
                                </li>
								<li>
                                    <a class="{{ Request::is('phones') ? 'active' : '' }}" href="/phones"><i class="si si-screen-smartphone"></i><span class="sidebar-mini-hide">{{trans('lang-e2s::routes.phones')}}</span></a>  
                                </li>
								<li>
                                    <a class="{{ Request::is('logs') ? 'active' : '' }}" href="/logs"><i class="si si-book-open"></i><span class="sidebar-mini-hide">{{trans('lang-e2s::routes.logs')}}</span></a>  
                                </li>
								<li>
                                    <a class="{{ Request::is('smsd-settings') ? 'active' : '' }}" href="/smsd-settings"><i class="si si-settings"></i><span class="sidebar-mini-hide">{{trans('lang-e2s::routes.smsdset')}}</span></a>  
                                </li>
								<li class="nav-main-heading"><span class="sidebar-mini-hide">{{trans('lang-e2s::routes.admset')}}</span></li>
								<!--<li>
                                    <a class="{{ Request::is('cron') ? 'active' : '' }}" href="/cron"><i class="si si-clock"></i><span class="sidebar-mini-hide">Cron</span></a>  
                                </li>-->
								<li>
                                    <a class="{{ Request::is('users') ? 'active' : '' }}" href="/users"><i class="si si-users"></i><span class="sidebar-mini-hide">{{trans('lang-e2s::routes.sysuser')}}</span></a>  
                                </li>
								<li>
                                    <a class="{{ Request::is('phpinfo') ? 'active' : '' }}" href="/phpinfo"><i class="si si-info"></i><span class="sidebar-mini-hide">{{trans('lang-e2s::routes.phpinfo')}}</span></a>  
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            