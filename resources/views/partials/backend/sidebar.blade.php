<div class="left-side-bar">
		<div class="brand-logo">
			<a href="#">
				<img src="{{asset('backend/vendors/images/deskapp-logo.svg')}}" alt="" class="dark-logo">
				<img src="{{asset('backend/vendors/images/Mindtacker (white).png')}}" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li>
						<a href="{{route('admin.dashboard')}}" class="dropdown-toggle no-arrow {{ request()->is('admin/dashboard') ? 'active' : '' }}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-diagram"></span><span class="mtext">Dashboard</span>
						</a>
					</li>

					<li>
						<a href="#" class="dropdown-toggle no-arrow {{ request()->is('admin/onboarding') ? 'active' : '' }}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-diagram"></span><span class="mtext">Tharapist</span>
						</a>
					</li>

					<li>
						<a href="{{route('admin.onboardingQueIndex')}}" class="dropdown-toggle no-arrow {{ request()->is('admin/onboarding') ? 'active' : '' }}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-diagram"></span><span class="mtext">Onboarding</span>
						</a>
					</li>
					
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Brain Balance</span>
						</a>
						<ul class="submenu">
							<li><a href="{{route('admin.brainCategory')}}">Category</a></li>
							<li><a href="{{route('admin.brainSubCategory')}}">Sub Category</a></li>
							<li><a href="{{route('admin.brainBalContent')}}">Content</a></li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Self Care(Activities)</span>
						</a>
						<ul class="submenu">
							<li><a href="{{route('admin.selfCategory')}}">Category</a></li>
							<li><a href="#">Contents</a></li>
						</ul>
					</li>

					<li>
						<a href="{{route('admin.logout')}}" onclick="return confirm('Are you Sure Logout this site')" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-diagram"></span><span class="mtext">Logout</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>