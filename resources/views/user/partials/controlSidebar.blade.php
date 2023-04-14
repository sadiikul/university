<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3 text-center">
        <img width="70" class="rounded-circle" src="@if(Auth::user()->img == null){{ Avatar::create(Auth::user()->name)->toBase64() }}@else{{ asset(Auth::user()->img) }}@endif"
            alt="img">

        <div class="admin_profile">
            <a href="javascript:void(0);"><i class="fas fa-user mr-1"></i> {{ Auth::user()->name }}</a>
            <a href="javascript:void(0);"><i class="fas fa-envelope mr-1"></i> {{ Auth::user()->email }}</a>
            <a href="{{ route('user.profile.edit') }}"><i class="fas fa-edit mr-1"></i> Edit
                Profile</a>
            <a href="{{ route('user.profile.password.edit') }}"><i class="fas fa-lock mr-1"></i> Change
                Password</a>
            <!--Log out -->
            <a onclick="return confirm('Are you sure to logout?')" href="{{ route('user.logout') }}"><i class="fas fa-sign-out-alt mr-1"></i> Logout</a>
        </div>
        <br><br>

    </div>
</aside>
