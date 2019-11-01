<aside class="left-sidebar">
	<!-- Sidebar scroll-->
	<div class="scroll-sidebar">
			<!-- Sidebar navigation-->
			<nav class="sidebar-nav">
					<ul id="sidebarnav">
							<!-- User Profile-->
							<li>
									<!-- User Profile-->
									<div class="user-profile d-flex no-block dropdown mt-3">
											<div class="user-pic"><img src="{{asset('assets/images/users/1.jpg')}}" alt="users" class="rounded-circle" width="40" /></div>
											<div class="user-content hide-menu ml-2">
													<a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<h5 class="mb-0 user-name font-medium">{{auth()->user()->name}} <i class="fa fa-angle-down"></i></h5>
															<span class="op-5 user-email">{{auth()->user()->email}}</span>
													</a>
													<div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
															
															<div class="dropdown-divider"></div>
															<a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings mr-1 ml-1"></i> Account Setting</a>
															<div class="dropdown-divider"></div>
															<a class="dropdown-item" href="{{ route('logout') }}" 		onclick="event.preventDefault();
																document.getElementById('logout-form').submit();"><i class="fa fa-power-off mr-1 ml-1"></i> Logout
															</a>
													</div>
											</div>
									</div>
									<!-- End User Profile-->
							</li>
							
							
							<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('home')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
							<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('clients.index')}}" aria-expanded="false"><i class="mdi mdi-account-circle"></i><span class="hide-menu">Clients</span></a></li>
							<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('projects.index')}}" aria-expanded="false"><i class="mdi mdi-file-document-box"></i><span class="hide-menu">Projects</span></a></li>
							<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('notes.index')}}" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Notes</span></a></li>
							<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('documents.index')}}" aria-expanded="false"><i class="mdi mdi-file-cloud"></i><span class="hide-menu">Documents</span></a></li>
							<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('transactions.index')}}" aria-expanded="false"><i class="mdi mdi-file-send"></i><span class="hide-menu">Transactions</span></a></li>
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('reports.index')}}" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Reports</span></a></li>
							
							
							<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-settings-box"></i><span class="hide-menu">Settings</span></a>
								<ul aria-expanded="false" class="collapse  first-level">
								<li class="sidebar-item"><a href="{{route('income-sources.index')}}" class="sidebar-link"><i class="mdi mdi-view-quilt"></i><span class="hide-menu">Income Sources </span></a></li>
								<li class="sidebar-item"><a href="{{route('currencies.index')}}" class="sidebar-link"><i class="mdi mdi-view-quilt"></i><span class="hide-menu">Currencies </span></a></li>
								<li class="sidebar-item"><a href="{{route('transaction-types.index')}}" class="sidebar-link"><i class="mdi mdi-view-quilt"></i><span class="hide-menu">Transaction Types </span></a></li>	
								<li class="sidebar-item"><a href="{{route('project-statuses.index')}}" class="sidebar-link"><i class="mdi mdi-view-quilt"></i><span class="hide-menu">Project Statuses </span></a></li>		
								</ul>
							</li>
						
					
							<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('logout') }}" onclick="event.preventDefault();
							document.getElementById('logout-form').submit();" aria-expanded="false"><i class="mdi mdi-directions"></i><span class="hide-menu">Log Out</span></a>
							</li>
					</ul>
			</nav>
			<!-- End Sidebar navigation -->
	</div>
	<!-- End Sidebar scroll-->
</aside>