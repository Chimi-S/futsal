@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp
<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="{{route('admin.dashboard')}}">
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('adminbackend/images/logo-dark.png')}}" alt="Logo" style="max-height: 70px;">
                    </div>
                </a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{{route('admin.dashboard')}}">
                    <i data-feather="grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview {{ ($prefix == '/timeslot') ? 'active':'' }} ">
                <a href=" #">
                    <i data-feather="clock"></i>
                    <span>Time Slot</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('time_slot.add')}}"><i class="ti-more"></i>Add </a></li>
                    <li><a href="{{route('time_slot.view')}}"><i class="ti-more"></i>View</a></li>
                </ul>
            </li>
            <li class="treeview {{ ($prefix == '/pricing') ? 'active':'' }}">
                <a href="#">
                    <i data-feather="dollar-sign"></i> <span>Pricing</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('pricing.add')}}"><i class="ti-more"></i>Add</a></li>
                    <li><a href="{{route('pricing.view')}}"><i class="ti-more"></i>View</a></li>
                </ul>
            </li>
            <li class="treeview {{ ($prefix == '/bank-account-detail') ? 'active':'' }}">
                <a href="#">
                    <i data-feather="file-minus"></i> <span>Bank Account Details</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('qr_code.add')}}"><i class="ti-more"></i>Add </a></li>
                    <li><a href="{{route('qr_code.view')}}"><i class="ti-more"></i>View </a></li>
                </ul>
            </li>
        </ul>
    </section>
</aside>