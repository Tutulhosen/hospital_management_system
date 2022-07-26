@extends('admin.layout.app')

@section('main-content')
<div class="page-wrapper">
			
    <div class="content container-fluid">
        
        <!-- Page Header -->

        @include('admin.layout.page-header')
        <!-- /Page Header -->
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Doctor</h4>
                    </div>
                    @if (Session::has('success-mid'))
                    @include('validate.validate')
                    @endif
        
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Name</td>
                                    <td>Email</td>
                                    <td>Cell</td>
                                    <td>Speciality</td>
                                    <td>Room</td>
 
                                 <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                               
        
                                    @forelse ($doctor_data as $doctor)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{$doctor->name}}</td>
                                    <td>{{$doctor->email}}</td>
                                    <td>{{$doctor->cell}}</td>
                                    <td>{{$doctor->speciality}}</td>
                                    <td>{{$doctor->room}}</td>

                                    <td>
                                        
                                        <a class="btn btn-sm btn-warning" href="{{route('admin.doctor.edit', $doctor->id)}}"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-sm btn-danger delete_btn" href="{{route('admin.doctor.delete', $doctor->id)}}"><i class="fa fa-trash"></i></a>
                                        
        
                                    </td>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            <p >No doctor data found</p>
                                        </td>
                                    </tr>
                                </tr>
                                    @endforelse
        
        
                            </tbody>
                        </table>
                       
                    </div>
                </div>
            </div>
        
        
            
        </div>
        
    </div>			
</div>				
                    
@endsection
