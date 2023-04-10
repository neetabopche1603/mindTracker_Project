<?php
use Illuminate\Support\Facades\DB;

$admin = DB::table('admins')->where('email',session()->get('adminUser_name'))->first();
if (!session()->has('adminUser_name') && empty($admin)){
	?>
<script>
    window.location.href = "{{ route('admin.loginGet') }}";
</script>
<?php
	die();
	}
?>

<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>
        <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
    </div>
    <div class="header-right">
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="{{$admin->avatar}}" alt="">
                    </span>
                    <span class="user-name">{{ $admin->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="{{route('admin.adminProfilePage')}}"><i class="dw dw-user1"></i> Profile</a>
                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                        onclick="return confirm('Are you sure logout this site')"><i class="dw dw-logout"></i> Log
                        Out</a>
                </div>
            </div>
        </div>
    </div>
</div>
