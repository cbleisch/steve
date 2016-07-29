<div class="page-aside">
	<div class="fixed">
		<div class="content">
            <div class="header">
                <h2 class="page-title">&nbsp;&nbsp;&nbsp;<i class="fa fa-gears"></i> Setup</h2>
            </div>
            <div class="content">
                <ul class="nav nav-pills nav-stacked">
                    <li {{ (Request::is('setup/motors/index') ? 'class="active"' : '') }}><a href="{{ route('setup.motors.index.get') }}">Motor Information</a></li>
                    <li {{ (Request::is('setup/accounts_receivable/index') ? 'class="active"' : '') }}><a href="{{ route('setup.accounts_receivable.index.get') }}">AR Information</a></li>
					@if (Auth::user()->is_admin)
                    <br><br><br><br>
					<li {{ (Request::is('setup/users/index') ? 'class="active"' : '') }}><a href="{{ route('setup.users.index.get') }}">Users</a></li>
					@endif
                </ul>
            </div>
        </div>
    </div>
</div>
