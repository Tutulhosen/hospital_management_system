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
        
        
            <div class="col-md-3">
        
              
        
                {{-- admin user part  --}}
                @if ($form_type==='add')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Doctor</h4>
                    </div>
                    @if (Session::has('success')|| $errors->any())
                      @include('validate.validate')
                    @endif
        
                    <div class="card-body">
        
        
                        <form action="{{route('admin.doctor.create')}}" method="POST">
                            @csrf
                            <div class="form-group form-focus">
                                <label class="focus-label">Name</label>
                                <input name="name" type="text" value="{{old('name')}}" class="form-control floating">
                              </div>
                              <div class="form-group form-focus">
                                <label class="focus-label">Your Email</label>
                                <input name="email" type="text" value="{{old('email')}}" class="form-control floating">
                              </div>
                              <div class="form-group form-focus">
                                <label class="focus-label">Your Mobile</label>
                                <input name="cell" type="text" value="{{old('cell')}}" class="form-control floating">
                              </div>
                              <div class="form-group form-focus">
                                <label class="focus-label">Create Password</label>
                                <input name="password" type="password" class="form-control floating">
                              </div>
                              <div class="form-group form-focus">
                                
                                <label class="focus-label">Speciality</label>
                                <select class="form-control" name="speciality" id="">
                                  <option value="">--select--</option>
                                  @forelse ($speciality_data as $item)
                                  <option value="{{$item->name}}">{{$item->name}}</option>
                                  @empty
                                  <tr>
                                    <td colspan="8" class="text-center">
                                        <p >No  data found</p>
                                    </td>
                                </tr>
                                  @endforelse
                                  
                              </select>
                              </div>
                              <div class="form-group form-focus">
                                
                                <label class="focus-label">Room No</label>
                                <select class="form-control" name="room" id="">
                                    <option value="">--select--</option>
                                    @forelse ($room_data as $item)
                                    <option value="{{$item->name}}">{{$item->name}}</option>
                                    @empty
                                    <tr>
                                      <td colspan="8" class="text-center">
                                          <p >No  data found</p>
                                      </td>
                                  </tr>
                                    @endforelse
                              </select>
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
        
        
                        <form action="{{route('admin.doctor.update', $doctor_id->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input value="{{ $doctor_id->name }}" name="name" type="text" class="form-control">
                            </div>
        
                            <div class="form-group">
                                <label>Email</label>
                                <input value="{{ $doctor_id->email }}" name="email" type="text" class="form-control">
                            </div>
        
                            
        
                            <div class="form-group">
                                <label>Cell</label>
                                <input value="{{ $doctor_id->cell }}" name="cell" type="text" class="form-control">
                            </div>
        
                            <div class="form-group">
                                <label>Speciality</label>
                                <select class="form-control" name="speciality" id="">
                                    <option value="">--select--</option>
                                    
                                    @forelse ($speciality_data as $role)
                                        <option @if ($role->name == $doctor_id->speciality) selected
                                        @endif value="{{$role->name}}">{{$role->name}}</option>
                                    @empty
                                    <option>No Role data found</option>
                                    @endforelse
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Room</label>
                                <select class="form-control" name="room" id="">
                                    <option value="">--select--</option>
                                    
                                    @forelse ($room_data as $role)
                                        <option @if ($role->name == $doctor_id->room) selected
                                        @endif value="{{$role->name}}">{{$role->name}}</option>
                                    @empty
                                    <option>No Role data found</option>
                                    @endforelse
                                </select>
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
