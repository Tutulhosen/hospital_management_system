<div class="row">
    <div class="col-md-6 d-flex">
    
        <!-- Recent Orders -->
        <div class="card card-table flex-fill">
            <div class="card-header">
                <h4 class="card-title">Doctors List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>Doctor Name</th>
                                <th>Speciality</th>
                                <th>Eamil</th>
                                <th>Cell</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($doctor_data as $doctor)
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        @if ($doctor->photo=='avatar.png')
                                        <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{url('avatar.png')}}" alt="User Image"></a>
                                        @endif
                                        @if ($doctor->photo !='avatar.png')
                                        <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{url('storage/doctor/' . $doctor->photo)}}" alt="User Image"></a>
                                        @endif
                                       
                                        <a href="profile.html">{{$doctor->name}}</a>
                                    </h2>
                                </td>
                                <td>{{$doctor->speciality}}</td>
                                <td>{{$doctor->email}}</td>
                                <td>
                                    {{$doctor->cell}}
                                </td>
                            </tr>
                            @empty
                                no doctor found
                            @endforelse
                            

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /Recent Orders -->
        
    </div>
    <div class="col-md-6 d-flex">
    
        <!-- Feed Activity -->
        <div class="card  card-table flex-fill">
            <div class="card-header">
                <h4 class="card-title">Patients List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-center mb-0">
                        <thead>
                            <tr>													
                                <th>Patient Name</th>
                                <th>Phone</th>
                                <th>Email</th>
												
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($patient_data as $patient)
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                        
                                        <a href="profile.html">{{$patient->name}} </a>
                                    </h2>
                                </td>
                                <td>{{$patient->cell}}</td>
                                <td>{{$patient->email}}</td>

                            </tr> 
                            @empty
                                no patient found
                            @endforelse


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /Feed Activity -->
        
    </div>
</div>