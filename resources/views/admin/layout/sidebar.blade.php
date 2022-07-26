<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"> 
                    <span>Main</span>
                </li>
                @if (Auth::guard('doctor')->check()||Auth::guard('adminUser')->check())
                <li class="active"> 
                    <a href="{{route('admin.index')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                @endif
                
                <li> 
                    <a href="{{route('admin.appoinment.index')}}"><i class="fe fe-layout"></i> <span>Appointments</span></a>
                </li>
                @if (Auth::guard('doctor')->check()||Auth::guard('adminUser')->check())
                <li> 
                    <a href="{{route('admin.speciality')}}"><i class="fe fe-users"></i> <span>Specialities</span></a>
                </li>
                @endif
                <li> 
                    <a href="{{route('room.index')}}"><i class="fe fe-user"></i> <span>Room </span></a>
                </li>
                
                <li> 
                    <a href="{{route('admin.doctor.index')}}"><i class="fe fe-user-plus"></i> <span>Doctors</span></a>
                </li>
                <li> 
                    <a href="{{route('admin.patient.index')}}"><i class="fe fe-user"></i> <span>Patients</span></a>
                </li>
                <li> 
                    <a href=""><i class="fe fe-star-o"></i> <span>Reviews</span></a>
                </li>
                <li> 
                    <a href=""><i class="fe fe-activity"></i> <span>Transactions</span></a>
                </li>
                <li> 
                    <a href="{{route('admin.profile')}}"><i class="fe fe-vector"></i> <span>Settings</span></a>
                </li>
                <li class="submenu">
                    <a href=""><i class="fe fe-document"></i> <span> Admin Panel</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{route('adminuser.index')}}">Our Staff</a></li>
                        <li><a href="{{route('admin.role')}}">Role</a></li>
                        <li><a href="{{route('admin.permission')}}">Permission</a></li>
                    </ul>
                    
                </li>

            </ul>
        </div>
    </div>
</div>