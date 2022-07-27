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
                        <h4 class="card-title">All User</h4>
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
                                    <td>Role</td>
                                    <td>Created At</td>
                                 <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                               
        
                                    @forelse ($admin_user_data as $admin_user)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{$admin_user->name}}</td>
                                    <td>{{$admin_user->email}}</td>
                                    <td>{{$admin_user->cell}}</td>
                                    <td>{{$admin_user->role->name}}</td>
                                    <td>{{$admin_user->created_at->diffForHumans() }}</td>
                                    <td>
                                        @if ($admin_user->name != 'Super Admin' || $admin_user->email !='super@admin.com')
                                        <a class="btn btn-sm btn-warning" href="{{route('admin.user.edit', $admin_user->id)}}"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-sm btn-danger delete_btn" href="{{route('admin.user.delete', $admin_user->id)}}"><i class="fa fa-trash"></i></a>
                                        @endif
        
                                    </td>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            <p >No admin data found</p>
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
                        <h4 class="card-title">Add New User</h4>
                    </div>
                    @if (Session::has('success')|| $errors->any())
                      @include('validate.validate')
                    @endif
        
                    <div class="card-body">
        
        
                        <form action="{{route('admin.user.create')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input value="{{ old('name') }}" name="name" type="text" class="form-control">
                            </div>
        
                            <div class="form-group">
                                <label>Email</label>
                                <input value="{{ old('email') }}" name="email" type="text" class="form-control">
                            </div>
        
                            <div class="form-group">
                                <label>User Name</label>
                                <input value="{{ old('username') }}" name="username" type="text" class="form-control">
                            </div>
        
                            <div class="form-group">
                                <label>Cell</label>
                                <input value="{{ old('cell') }}" name="cell" type="text" class="form-control">
                            </div>
        
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control" name="role" id="">
                                    <option value="">--select--</option>
                                    
                                    @forelse ($role_data as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
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
        
        
                {{-- user edit part  --}}
                @if ($form_type==='edit')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit User Data</h4>
                    </div>
                    @if (Session::has('success')|| $errors->any())
                      @include('validate.validate')
                    @endif
        
                    <div class="card-body">
        
        
                        <form action="{{route('admin.user.update', $edit_id->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input value="{{ $edit_id->name }}" name="name" type="text" class="form-control">
                            </div>
        
                            <div class="form-group">
                                <label>Email</label>
                                <input value="{{ $edit_id->email }}" name="email" type="text" class="form-control">
                            </div>
        
                            <div class="form-group">
                                <label>User Name</label>
                                <input value="{{ $edit_id->username }}" name="username" type="text" class="form-control">
                            </div>
        
                            <div class="form-group">
                                <label>Cell</label>
                                <input value="{{ $edit_id->cell }}" name="cell" type="text" class="form-control">
                            </div>
        
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control" name="role" id="">
                                    <option value="">--select--</option>
                                    @forelse ($role_data as $role)
                                        <option @if ($role->id == $edit_id->role_id) selected
                                        @endif value="{{$role->id}}">{{$role->name}}</option>
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
