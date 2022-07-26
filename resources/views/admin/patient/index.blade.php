@extends('admin.layout.app')

@section('main-content')
<div class="page-wrapper">
			
    <div class="content container-fluid">
        
        <!-- Page Header -->

        @include('admin.layout.page-header')
        <!-- /Page Header -->
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Patient</h4>
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
                                    
 
                                 <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                               
                                
                                    @forelse ($patient_data as $patient)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{$patient->name}}</td>
                                    <td>{{$patient->email}}</td>
                                    <td>{{$patient->cell}}</td>
                                    

                                    <td>
                                        
                                        <a class="btn btn-sm btn-warning" href="{{route('admin.patient.edit', $patient->id)}}"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-sm btn-danger " href="{{route('admin.patient.delete', $patient->id)}}"><i class="fa fa-trash"></i></a>
                                        
        
                                    </td>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            <p >No Patient data found</p>
                                        </td>
                                    </tr>
                                </tr>
                                    @endforelse
        
        
                            </tbody>
                        </table>
                       
                    </div>
                </div>
            </div>
        
        
            <div class="col-md-4">
        
            
        
                {{-- admin user part  --}}
                @if ($form_type==='add')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Patient</h4>
                    </div>
                    @if (Session::has('success')|| $errors->any())
                      @include('validate.validate')
                    @endif
        
                    <div class="card-body">
        
        
                        <form action="{{route('admin.patient.create')}}" method="POST">
                            @csrf
                            <div class="form-group form-focus">
                                <label class="focus-label">Name</label>
                                <input name="name" type="text" value="{{old('name')}}" class="form-control floating">
                              </div>
                              <div class="form-group form-focus">
                                <label class="focus-label">Email</label>
                                <input name="email" type="text" value="{{old('email')}}" class="form-control floating">
                              </div>
                              <div class="form-group form-focus">
                                <label class="focus-label"> Mobile</label>
                                <input name="cell" type="text" value="{{old('cell')}}" class="form-control floating">
                              </div>
                              <div class="form-group form-focus">
                                <label class="focus-label">Create Password</label>
                                <input name="password" type="password" class="form-control floating">
                              </div>
                              
                             
                              
                              <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Signup</button>
                        </form>
        
        
                    </div>
                </div>
                @endif
        
        
                {{-- user edit part  --}}
                @if ($form_type==='edit')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Doctor Data</h4>
                    </div>
                    @if (Session::has('success')|| $errors->any())
                      @include('validate.validate')
                    @endif
        
                    <div class="card-body">
        
        
                        <form action="{{route('admin.patient.update', $edit_data->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input value="{{ $edit_data->name }}" name="name" type="text" class="form-control">
                            </div>
        
                            <div class="form-group">
                                <label>Email</label>
                                <input value="{{ $edit_data->email }}" name="email" type="text" class="form-control">
                            </div>
        
                            
        
                            <div class="form-group">
                                <label>Mobile</label>
                                <input value="{{ $edit_data->cell }}" name="cell" type="text" class="form-control">
                            </div>

                            
                            

                            
        
        
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
        
        
                    </div>
                </div>
                @endif
        
        
        
            </div>
        </div>
        
    </div>			
</div>				
                    
@endsection
