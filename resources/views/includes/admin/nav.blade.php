<li class="{{ (Request::segment(2) == '' || Request::segment(2) == 'home') ? 'active' : '' }}">
    <a href="{{ url('admin/home') }}">
        <i class="fa fa-dashboard fa-fw"></i> <span>Dashboard</span>
    </a>
</li>
<li class="{{ Request::segment(2) == 'companies' ? 'active' : '' }}">
    <a href="{{ url('admin/companies') }}">
        <i class="fa fa-building fa-fw"></i> <span>Companies</span>
    </a>
</li>
<li class="{{ Request::segment(2) == 'pages' ? 'active' : '' }}">
    <a href="{{ url('admin/pages') }}">
        <i class="fa fa-files-o fa-fw"></i> <span>Pages</span>
    </a>
</li>
<li class="{{ Request::segment(2) == 'posts' ? 'active' : '' }}">
    <a href="{{ url('admin/posts') }}">
        <i class="fa fa-book fa-fw"></i> <span>Posts</span>
    </a>
</li>
<li class="{{ Request::segment(2) == 'users' ? 'active' : '' }}">
    <a href="{{ url('admin/users') }}">
        <i class="fa fa-users fa-fw"></i> <span>Users</span>
    </a>
</li>
<li class="{{ Request::segment(2) == 'projects' ? 'active' : '' }}">
    <a href="{{ url('admin/projects') }}">
        <i class="fa fa-file fa-fw"></i> <span>Projects</span>
    </a>
</li>
<li class="{{ Request::segment(2) == 'quotes' ? 'active' : '' }}">
    <a href="{{ url('admin/quotes') }}">
        <i class="fa fa-calculator fa-fw"></i> <span>Quotes</span>
    </a>
</li>
<li class="{{ Request::segment(2) == 'verify' ? 'menu-open' : '' }} treeview">
    <a href="#">
        <i class="fa fa-check fa-fw"></i> <span>Verify</span>
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
