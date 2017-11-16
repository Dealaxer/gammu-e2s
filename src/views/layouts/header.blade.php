			<header id="header-navbar" class="content-mini content-mini-full">
                <ul class="nav-header pull-right">
                    <li>
                        <div class="btn-group">
                            <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                                <img src="assets/img/avatars/avatar10.jpg" alt="Avatar">
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class="dropdown-header">{{trans('lang-e2s::routes.profile')}}</li>
                                <li>
                                    <a tabindex="-1" href="/inbox">
                                        <i class="si si-envelope-open pull-right"></i>
                                        <span class="badge badge-primary pull-right">{{DB::table('inbox')->whereNotIn('Class', [127])->count()}}</span>{{trans('lang-e2s::routes.inbox')}}
                                    </a>
                                </li>
                                <li>
                                    <a tabindex="-1" href="/users">
                                        <i class="si si-user pull-right"></i>
                                        <span class="badge badge-success pull-right"></span>{{trans('lang-e2s::routes.users')}}
                                    </a>
                                </li>
                                <li>
                                    <a tabindex="-1" href="/smsd-settings">
                                        <i class="si si-settings pull-right"></i>{{trans('lang-e2s::routes.smsdset')}}
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li class="dropdown-header">{{trans('lang-e2s::routes.actions')}}</li>
                                <!--<li>
                                    <a tabindex="-1" href="javascript:void(0)">
                                        <i class="si si-lock pull-right"></i>Lock Account
                                    </a>
                                </li>-->
                                <li>
									<a tabindex="-1" href="{{ route('logout') }}"
										onclick="event.preventDefault();
												 document.getElementById('logout-form').submit();">
										<i class="si si-logout pull-right"></i>{{trans('lang-e2s::routes.logout')}}
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										{{ csrf_field() }}
									</form>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
				
                <ul class="nav-header pull-left">
                    <li class="hidden-md hidden-lg">
                        <button class="btn btn-default" data-toggle="layout" data-action="sidebar_toggle" type="button">
                            <i class="fa fa-navicon"></i>
                        </button>
                    </li>
                    <li class="hidden-xs hidden-sm">
                        <button class="btn btn-default" data-toggle="layout" data-action="sidebar_mini_toggle" type="button">
                            <i class="fa fa-ellipsis-v"></i>
                        </button>
                    </li>
                    <li>
                        <button class="btn btn-default pull-right" data-toggle="modal" data-target="#apps-modal" type="button">
                            <i class="si si-grid"></i>
                        </button>
                    </li>
                    <li class="visible-xs">
                        <button class="btn btn-default" data-toggle="class-toggle" data-target=".js-header-search" data-class="header-search-xs-visible" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </li>
                    <li class="js-header-search header-search">
                        <form class="form-horizontal" action="base_pages_search.html" method="post">
                            <div class="form-material form-material-primary input-group remove-margin-t remove-margin-b">
                                <input class="form-control" type="text" id="base-material-text" name="base-material-text" placeholder="{{trans('lang-e2s::routes.search')}}...">
                                <span class="input-group-addon"><i class="si si-magnifier"></i></span>
                            </div>
                        </form>
                    </li>
                </ul>
            </header>
            