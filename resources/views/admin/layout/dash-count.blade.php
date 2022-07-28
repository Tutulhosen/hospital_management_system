<div class="row">
    <div class="col-xl-4 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                    <span class="dash-widget-icon text-primary border-primary">
                        <i class="fe fe-users"></i>
                    </span>
                    <div class="dash-count">
                        <h3>{{$doctor_data->count()}}</h3>
                    </div>
                </div>
                <div class="dash-widget-info">
                    <h6 class="text-muted">Doctors</h6>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-primary w-50"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                    <span class="dash-widget-icon text-success">
                        <i class="fe fe-credit-card"></i>
                    </span>
                    <div class="dash-count">
                        <h3>{{$patient_data->count()}}</h3>
                    </div>
                </div>
                <div class="dash-widget-info">
                    
                    <h6 class="text-muted">Patients</h6>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-success w-50"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                    <span class="dash-widget-icon text-danger border-danger">
                        <i class="fe fe-money"></i>
                    </span>
                    <div class="dash-count">
                        <h3>{{$appoinment_data->count()}}</h3>
                    </div>
                </div>
                <div class="dash-widget-info">
                    
                    <h6 class="text-muted">Appointment</h6>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-danger w-50"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>