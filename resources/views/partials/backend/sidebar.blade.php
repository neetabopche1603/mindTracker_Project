<div class="left-side-bar">
    <div class="brand-logo">
        <a href="#">
            <img src="{{ asset('backend/vendors/images/deskapp-logo.svg') }}" alt="" class="dark-logo">
            <img src="{{ asset('backend/vendors/images/Mindtacker (white).png') }}" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="dropdown-toggle no-arrow {{ request()->is('admin/dashboard') ? 'active' : '' }}"
                        class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-home"></span><span class="mtext">Dashboard</span>
                    </a>
                </li>

                <li class="dropdown {{ request()->is('admin/therapist*') ? 'show' : '' }}">
                    <a href="javascript:void(0);"
                        class="dropdown-toggle {{ request()->is('admin/therapist*') ? 'active' : '' }}">
                        <span class="micon dw dw-add-user"></span><span class="mtext">Therapist</span>
                    </a>
                    <ul class="submenu" style="display: {{ request()->is('admin/therapist*') ? 'block' : 'none' }}">
                        <li><a href="{{ route('admin.therapist') }}"
                                class="{{ request()->is('admin/therapist-list') ? 'active' : '' }}">Therapist List
                            </a></li>

                        {{-- <li><a class="{{ request()->is('admin/valuation/show-archive-leads') ? 'active' : '' }}" href="{{route('admin.getArchiveLeads')}}">All Archive Leads</a></li> --}}
                    </ul>
                </li>

                <li class="dropdown {{ request()->is('admin/users*') ? 'show' : '' }}">
                    <a href="javascript:void(0);"
                        class="dropdown-toggle {{ request()->is('admin/users*') ? 'active' : '' }}">
                        <span class="micon dw dw-user"></span><span class="mtext">Users</span>
                    </a>
                    <ul class="submenu" style="display: {{ request()->is('admin/users*') ? 'block' : 'none' }}">
                        <li><a href="{{ route('admin.usersList') }}"
                                class="{{ request()->is('admin/users-list') ? 'active' : '' }}">Users List
                            </a></li>
                        {{-- <li><a class="{{ request()->is('admin/valuation/show-archive-leads') ? 'active' : '' }}" href="{{route('admin.getArchiveLeads')}}">All Archive Leads</a></li> --}}
                        <li><a class="{{ request()->is('admin/user*') ? 'active' : '' }}"
                                href="{{ route('admin.userOnboardQuesAnsList') }}">Onboarding Ques Ans</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('admin.appointments') }}"
                        class="dropdown-toggle no-arrow {{ request()->is('admin/appointments*') ? 'active' : '' }}"
                        class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-bookmark2"></span><span class="mtext">Appointments</span>
                    </a>
                </li>

 					<li>
                    <a href="{{ route('admin.onboardingQueIndex') }}"
                        class="dropdown-toggle no-arrow {{ request()->is('admin/onboarding') ? 'active' : '' }}"
                        class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-align-left"></span><span class="mtext">Onboarding</span>
                    </a>
                </li>
				
                <li class="dropdown {{ request()->is('admin/brainBalance*') ? 'show' : '' }}">
                    <a href="javascript:void(0);"
                        class="dropdown-toggle {{ request()->is('admin/brainBalance*') ? 'active' : '' }}">
                        <span class="micon dw dw-remove"></span><span class="mtext">Brain Balance</span>
                    </a>

                    <ul class="submenu" style="display: {{ request()->is('admin/brainBalance*') ? 'block' : 'none' }}">
                        <li><a class="{{ request()->is('admin/brainBalance-category*') ? 'active' : '' }}" href="{{ route('admin.brainCategory') }}">Category</a></li>

                        <li><a class="{{ request()->is('admin/brainBalance-SubCategory*') ? 'active' : '' }}"  href="{{ route('admin.brainSubCategory') }}">Sub Category</a></li>


                        <li><a class="{{ request()->is('admin/brainBalance-contents*') ? 'active' : '' }}" href="{{ route('admin.brainBalContent') }}">Content</a></li>
                    </ul>
                </li>


				{{-- <li class="dropdown {{ request()->is('admin/selfCare*') ? 'show' : '' }}">
					<a href="javascript:void(0);"
                        class="dropdown-toggle {{ request()->is('admin/selfCare*') ? 'active' : '' }}">
                        <span class="micon dw dw-remove"></span><span class="mtext">Self Care(Activities)</span>
                    </a>

                    <ul class="submenu" style="display: {{ request()->is('admin/selfCare*') ? 'block' : 'none' }}">
                        <li><a class="{{ request()->is('admin/selfCare-category*') ? 'active' : '' }}"  href="{{ route('admin.selfCategory') }}">Category</a></li>
						
                        <li><a class="{{ request()->is('admin/selfCare-contents*') ? 'active' : '' }}"  href="#">Contents</a></li>
                    </ul>
                </li> --}}
                
                {{-- <li>
                    <a href="{{ route('admin.journalPostList') }}"
                        class="dropdown-toggle no-arrow {{ request()->is('admin/journal*') ? 'active' : '' }}"
                        class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-diagram"></span><span class="mtext">Journals</span>
                    </a>
                </li> --}}

                <li>
                    <a href="{{ route('admin.journalists') }}"
                        class="dropdown-toggle no-arrow {{ request()->is('admin/journalist*') ? 'active' : '' }}"
                        class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-open-book-2"></span><span class="mtext">Journals</span>
                    </a>
                </li>

                <li class="dropdown {{ request()->is('admin/group*') ? 'show' : '' }}">
                    <a href="javascript:void(0);"
                        class="dropdown-toggle {{ request()->is('admin/group*') ? 'active' : '' }}">
                        <span class="micon dw dw-group"></span><span class="mtext">Community Support</span>
                    </a>
                    <ul class="submenu" style="display: {{ request()->is('admin/group*') ? 'block' : 'none' }}">
                        <li><a href="{{ route('admin.communityGroups') }}"
                                class="{{ request()->is('admin/group-list') ? 'active' : '' }}">Groups
                            </a></li>

                            <li><a href="{{ route('admin.communityPostsList') }}"
                                class="{{ request()->is('admin/community-posts-List*') ? 'active' : '' }}">Post
                            </a></li>

                        {{-- <li><a class="{{ request()->is('admin/valuation/show-archive-leads') ? 'active' : '' }}" href="{{route('admin.getArchiveLeads')}}">All Archive Leads</a></li> --}}
                    </ul>
                </li>


                <li>
                    <a href="{{ route('admin.reviewsRatting') }}"
                        class="dropdown-toggle no-arrow {{ request()->is('admin/reviews.*') ? 'active' : '' }}"
                        class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-star"></span><span class="mtext">Ratings & Reviews</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.moodTypeList') }}"
                        class="dropdown-toggle no-arrow {{ request()->is('admin/moodtype*') ? 'active' : '' }}"
                        class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-support"></span><span class="mtext">User Mood Track</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.logout') }}" onclick="return confirm('Are you Sure Logout this site')"
                        class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-logout1"></span><span class="mtext">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>
