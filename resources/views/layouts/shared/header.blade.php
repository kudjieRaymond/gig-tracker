<header class="topbar">
	<nav class="navbar top-navbar navbar-expand-md navbar-dark">
			<div class="navbar-header">
					<!-- This is for the sidebar toggle which is visible on mobile only -->
					<a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
					<!-- ============================================================== -->
					<!-- Logo -->
					<!-- ============================================================== -->
					<a class="navbar-brand" href="{{route('home')}}">
							<!-- Logo icon -->
							{{-- <b class="logo-icon">
									<!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
									<!-- Dark Logo icon -->
									<img src="{{asset('front-register/images/logo.png')}}" alt="homepage" class="dark-logo" width="120px" />
									<!-- Light Logo icon -->
									<img src="{{asset('front-register/images/logo-light.png')}}" alt="homepage" class="light-logo" width="120px"/>
							</b> --}}
							<!--End Logo icon -->
							<!-- Logo text -->
							<span class="logo-text text-white font-weight-bolder">
									GIG-TRACKER
									 <!-- dark Logo text -->
									 {{-- <img src="{{asset('assets/images/logo-text.png')}}" alt="Gig" class="dark-logo" width="180px" />
									 <!-- Light Logo text -->    
									 <img src="{{asset('front-register/images/logo-light.png')}}" class="light-logo" alt="homepage" width="180px" /> --}}
							</span>
					</a>
					<!-- ============================================================== -->
					<!-- End Logo -->
					<!-- ============================================================== -->
					<!-- ============================================================== -->
					<!-- Toggle which is visible on mobile only -->
					<!-- ============================================================== -->
					<a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
			</div>
			<!-- ============================================================== -->
			<!-- End Logo -->
			<!-- ============================================================== -->
			<div class="navbar-collapse collapse" id="navbarSupportedContent">
					<!-- ============================================================== -->
					<!-- toggle and nav items -->
					<!-- ============================================================== -->
					<ul class="navbar-nav float-left mr-auto">
							<li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
						
							
							<!-- ============================================================== -->
							<!-- Search -->
							<!-- ============================================================== -->
							<li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
									<form class="app-search position-absolute">
											<input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
									</form>
							</li>
					</ul>
					<!-- ============================================================== -->
					<!-- Right side toggle and nav items -->
					<!-- ============================================================== -->
					<ul class="navbar-nav float-right">
							
							<!-- ============================================================== -->
							<!-- Comment -->
							<!-- ============================================================== -->
							{{-- <li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-bell font-24"></i>
											
									</a>
									<div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
											<span class="with-arrow"><span class="bg-primary"></span></span>
											<ul class="list-style-none">
													<li>
														
															<div class="drop-title bg-primary text-white">
																	<h4 class="m-b-0 m-t-5">0 New</h4>
																	<span class="font-light">Notifications</span>
															</div>
															
													</li>

													<li>
															<div class="message-center notifications">
														
															</div>
													</li>
													<li>
													<a class="nav-link text-center m-b-5" href=""> <strong>Clear all notifications </strong> <i class="fa fa-angle-right"></i> </a>
													</li>
											</ul>
									</div>
							</li> --}}
							<!-- ============================================================== -->
							
							
							<!-- ============================================================== -->
							<!-- User profile and search -->
							<!-- ============================================================== -->
							<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('assets/images/users/1.jpg')}}" alt="user" class="rounded-circle" width="31"></a>
									<div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
											<span class="with-arrow"><span class="bg-primary"></span></span>
											<div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
													<div class=""><img src="{{asset('assets/images/users/1.jpg')}}" alt="user" class="img-circle" width="60"></div>
													<div class="m-l-10">
													<h4 class="m-b-0"> {{ucwords(auth()->user()->name)}}</h4>
															<p class=" m-b-0"> {{auth()->user()->email}}</p>
													</div>
											</div>
											{{-- <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a> --}}
										
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
											document.getElementById('logout-form').submit();"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
											<div class="dropdown-divider"></div>
											<div class="p-l-30 p-10"><a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded">View Profile</a></div>
											<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form> 
									</div>
							</li>
							<!-- ============================================================== -->
							<!-- User profile and search -->
							<!-- ============================================================== -->
					</ul>
			</div>
	</nav>
</header>