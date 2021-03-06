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
                        <h4 class="card-title">Basic Form</h4>
                        @if (Session::has('success-mid'))
                        @include('validate.validate')
                        @endif

                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Name</td>
                                    <td>Slug</td>
                                    <td>Created_at</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @forelse ($speciality_data as $data)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{$data->slug}}</td>
                                    <td>{{$data->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" href="{{route('admin.speciality.edit', $data->id)}}"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-sm btn-danger" href="{{ route('admin.speciality.delete' , $data->id) }}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <p >No Speciality data found</p>
                                    </td>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @if (Session::has('success')|| $errors->any())
                @include('validate.validate')
                @endif
                
                @if ($form_type==='add')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Speciality</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{route('admin.speciality.create')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Speciality name</label>
                                <input name="name" type="text" class="form-control">
                            </div>


                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>


                    </div>
                </div>
                @endif

                @if ($form_type==='edit')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Speciality</h4>
                        <br>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.speciality') }}">Add new Speciality</a>
                    </div>
                    <div class="card-body">

                        <form action="{{route('admin.speciality.update', $edit_data->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Speciality name</label>
                                <input name="name" type="text" class="form-control" value="{{ $edit_data->name }}">
                            </div>


                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Update</button>
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