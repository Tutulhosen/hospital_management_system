<div class="row">
    <div class="col-md-12">
    
        <!-- Recent Orders -->
        <div class="card card-table">
            <div class="card-header">
                <h4 class="card-title">Appointment List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>Doctor Name</th>
                                <th>Patient Name</th>
                                <th>Apointment Time</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($appoinment_data as $appoinment)
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        
                                        <a href="profile.html">{{$appoinment->doctor}}</a>
                                    </h2>
                                </td>

                                <td>
                                    <h2 class="table-avatar">
                                        
                                        <a href="profile.html">{{$appoinment->name}} </a>
                                    </h2>
                                </td>
                                <td> <span class="text-dark d-block">{{$appoinment->date}}</span></td>
                                <td>
                                    <div class="status-toggle">
                                        <a style="color:rgb(161, 26, 26)" href=>{{$appoinment->status}} </a>
                                    </div>
                                </td>

                            </tr>
                            @empty
                                no appoinment found
                            @endforelse


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /Recent Orders -->
        
    </div>
</div>