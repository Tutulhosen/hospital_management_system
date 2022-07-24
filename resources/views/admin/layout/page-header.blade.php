
@if (Auth::guard('adminUser')->check())
<div class="page-header">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">Welcome {{Auth::guard('adminUser')->user()->name}}!</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard</li>
            </ul>
        </div>
    </div>
</div>
@endif

@if (Auth::guard('doctor')->check())
<div class="page-header">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">Welcome {{Auth::guard('doctor')->user()->name}}!</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard</li>
            </ul>
        </div>
    </div>
</div>
@endif