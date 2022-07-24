<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"> 
                    <span>Main</span>
                </li>
                @if (Auth::guard('doctor')->check())
                <li class="active"> 
                    <a href=""><i class="fe fe-home"></i> <span>Profile</span></a>
                </li>
                @endif

                @if (Auth::guard('doctor')->check())
                <li class=""> 
                    <a href=""><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                @endif

                @if (Auth::guard('doctor')->check())
                <li class=""> 
                    <a href=""><i class="fe fe-home"></i> <span>Your patient</span></a>
                </li>
                @endif
                
                
                @if (Auth::guard('doctor')->check())
                <li> 
                    <a href=""><i class="fe fe-layout"></i> <span>Appointments</span></a>
                </li>
                @endif
                
                
                
                
                
                <li> 
                    <a href=""><i class="fe fe-vector"></i> <span>Settings</span></a>
                </li>
                

            </ul>
        </div>
    </div>
</div>