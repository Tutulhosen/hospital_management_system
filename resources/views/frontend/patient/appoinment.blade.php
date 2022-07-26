@extends('frontend.layout.app')
@section('main-content')
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Appoinment</h4>
                    <a class="btn btn-dark" href="{{route('patient.appoinment.create.index')}}">Create New Appoinment</a>
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
                                <td>Date</td>
                                <td>Doctor Name</td>
                                <td>status</td>
        
                             <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                          
        
                                @forelse ($appointment_data as $appointment)
                                
                            <tr>
                                @if (Auth::guard('patient')->user()->id==$appointment->user_id)
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{$appointment->name}}</td>
                                <td>{{$appointment->email}}</td>
                                <td>{{$appointment->cell}}</td>
                                <td>{{$appointment->date}}</td>
                                <td>{{$appointment->doctor}}</td>
                                <td><a class="btn btn-sm btn-primary">{{$appointment->status}}</a></td>
        
                                <td>
                                    
                                    <a class="btn btn-sm btn-warning" href="{{route('patient.appoinment.edit' , $appointment->id)}}">Edit</a>
                                    <a class="btn btn-sm btn-danger delete_btn" href="{{route('patient.appoinment.delete' , $appointment->id)}}">Delete</i></a>
                                    
        
                                </td>
                                @endif
                               
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
@endsection