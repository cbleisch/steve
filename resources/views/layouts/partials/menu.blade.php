<ul class="cl-vnavigation">
	<li>
		<a href="#"><i class="fa fa-home"></i><span>Dashboard</span></a>
		<li><a href="#"><i class="fa fa-file-text"></i><span>Proposals</span></a></li>
		<li class="{{ Request::url() == URL::route('internet.index.get') ? 'active' : '' }}"><a href="{{ URL::route('internet.index.get') }}"><i class="fa fa-wifi"></i><span>Internet Products</span></a></li>
		<li class="{{ Request::url() == URL::route('tv.index.get') ? 'active' : '' }}"><a href="{{ URL::route('tv.index.get') }}"><i class="fa fa-television"></i><span>TV Products</span></a></li>
		<li class="{{ Request::url() == URL::route('voice.index.get') ? 'active' : '' }}"><a href="{{ URL::route('voice.index.get') }}"><i class="fa fa-phone"></i><span>Voice Products</span></a></li>
		<li class="{{ Request::url() == URL::route('ip.index.get') ? 'active' : '' }}"><a href="{{ URL::route('ip.index.get') }}"><i class="fa fa-bolt"></i><span>Static IPs</span></a></li>
		<!-- <li><a href="#"><i class="fa fa-gear"></i><span>Motors</span></a></li>
		<li><a href="#"><i class="fa fa-building-o"></i><span>Customers</span></a></li>
		<li><a href="#"><i class="fa fa-users"></i><span>Contacts</span></a></li>
		<li><a href="#"><i class="fa fa-th"></i><span>Items</span></a></li>
		<li><a href="#"><i class="fa fa-sitemap"></i><span>Employees</span></a></li>
		<li><a href="#"><i class="fa fa-gears"></i><span>Setup</span></a></li> -->
	</li>
</ul>
