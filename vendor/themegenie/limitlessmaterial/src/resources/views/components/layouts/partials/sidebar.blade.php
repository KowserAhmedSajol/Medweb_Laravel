		<!-- Main sidebar -->
		<div class="sidebar sidebar-light sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				<span class="font-weight-semibold">Navigation</span>
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user-material">
					<div class="sidebar-user-material-body">
						<div style="background-image: url('{{asset('vendor/limitlessmaterial/global_assets/images/backgrounds/user_bg4.jpg')}}'); background-size: 100% 100%;" class="card-body text-center">
							<a href="#">
								<img src="{{asset('vendor/limitlessmaterial/global_assets/images/placeholders/placeholder.jpg')}}" class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt="">
							</a>
							<h6 class="mb-0 text-white text-shadow-dark">Farhan Labib</h6>
							<span class="font-size-sm text-white text-shadow-dark">Admin</span>
						</div>
													
						<div class="sidebar-user-material-footer">
							<a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle bg-dark" data-toggle="collapse"><span>My account</span></a>
						</div>
					</div>

					<div class="collapse" id="user-nav">
						<ul class="nav nav-sidebar">
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="icon-user-plus"></i>
									<span>My profile</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="icon-coins"></i>
									<span>My balance</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="icon-comment-discussion"></i>
									<span>Messages</span>
									<span class="badge bg-teal-400 badge-pill align-self-center ml-auto">58</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="icon-cog5"></i>
									<span>Account settings</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="icon-switch2"></i>
									<span>Logout</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
						<li class="nav-item">
							<a href="/dashboard" class="nav-link">
								<i class="icon-home4"></i>
								<span>
									Dashboard
								</span>
							</a>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-user-plus"></i> <span>Patient Entry</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="" class="nav-link">All Patient List</a></li>
								<li class="nav-item"><a href="" class="nav-link">Add a New Patient</a></li>
							</ul>
						</li>
						
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-enter"></i> <span>Bed Allotment</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="" class="nav-link">Bed Allotment List</a></li>
								<li class="nav-item"><a href="" class="nav-link">Bed Allotment Management</a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-lab"></i> <span>Medical Test</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="" class="nav-link">Medical Test Appointment List</a></li>
								<li class="nav-item"><a href="" class="nav-link">Medical Test Request</a></li>
								<li class="nav-item"><a href="" class="nav-link">Add New Test</a></li>
								<li class="nav-item"><a href="" class="nav-link">All Medical Tests</a></li>
								<li class="nav-item"><a href="" class="nav-link">Medical Test Category</a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-files-empty"></i> <span>Test Report</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="" class="nav-link">Upload Test Report</a></li>
								<li class="nav-item"><a href="" class="nav-link">See All Test Reports</a></li>
							</ul>
						</li>
						
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-user-tie"></i> <span>Doctor</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="{{ route('doctor_add')}}" class="nav-link">Add New Doctor</a></li>
								<li class="nav-item"><a href="{{ route('doctor_list')}}" class="nav-link">All Doctors</a></li>
								<li class="nav-item"><a href="{{ route('doctor_list')}}" class="nav-link">Doctor Category</a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-calendar3"></i> <span>Appointemnt</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="" class="nav-link">All Appoinment List</a></li>
								<li class="nav-item"><a href="" class="nav-link">Appointment Management</a></li>
							</ul>
						</li>
						
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-truck"></i> <span>Ambulance</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="" class="nav-link">Ambulance Request</a></li>
								<li class="nav-item"><a href="" class="nav-link">Ambulance Management</a></li>
							</ul>
						</li>
						
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-question4"></i> <span>FAQ</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="" class="nav-link">FAQ Request</a></li>
								<li class="nav-item"><a href="" class="nav-link">FAQ Management</a></li>
							</ul>
						</li>

						{{-- frontend management --}}
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs text-center">FRONTEND MANAGEMENT</div> <i class="icon-menu" title="Main"></i></li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-versions"></i> <span>Slider Management</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="" class="nav-link">Create a New Slider</a></li>
								<li class="nav-item"><a href="" class="nav-link">All Slider List</a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-newspaper"></i> <span>Blog & News Management</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="" class="nav-link">Add a New News</a></li>
								<li class="nav-item"><a href="" class="nav-link">All News List</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="contact-list.php" class="nav-link" data-submenu-title="Contact">
								<i class="icon-phone2"></i>
								<span>
									Contact
								</span>
							</a>
						</li>
					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->