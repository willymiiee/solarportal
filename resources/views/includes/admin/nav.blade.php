<li class="{{ (Request::segment(2) == '' || Request::segment(2) == 'home') ? 'active' : '' }}">
    <a href="{{ url('admin/home') }}">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>
</li>
<li class="{{ Request::segment(2) == 'companies' ? 'active' : '' }}">
    <a href="{{ url('admin/companies') }}">
        <i class="fa fa-building"></i> <span>Companies</span>
    </a>
</li>
<li class="{{ Request::segment(2) == 'pages' ? 'active' : '' }}">
    <a href="{{ url('admin/pages') }}">
        <i class="fa fa-files-o"></i> <span>Pages</span>
    </a>
</li>
<li class="{{ Request::segment(2) == 'posts' ? 'active' : '' }}">
    <a href="{{ url('admin/posts') }}">
        <i class="fa fa-book"></i> <span>Posts</span>
    </a>
</li>
<li class="{{ Request::segment(2) == 'users' ? 'active' : '' }}">
    <a href="{{ url('admin/users') }}">
        <i class="fa fa-users"></i> <span>Users</span>
    </a>
</li>
<li class="{{ Request::segment(2) == 'verify' ? 'menu-open' : '' }} treeview">
    <a href="#">
        <i class="fa fa-check"></i> <span>Verify</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>

    <ul class="treeview-menu" style="display: {{ Request::segment(2) == 'verify' ? 'block' : 'none' }}">
        <li class="{{ Request::segment(3) == 'packages' ? 'active' : '' }}">
            <a href="{{ route('admin.verify.packages.index') }}"><i class="fa fa-circle-o"></i> Packages</a>
        </li>

        <li>
            <a href=""><i class="fa fa-circle-o"></i> Transactions</a>
        </li>
    </ul>
</li>
