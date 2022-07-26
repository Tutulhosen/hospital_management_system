@extends('admin.layout.app')

@section('main-content')
<div class="page-wrapper">
			
    <div class="content container-fluid">
        
        <!-- Page Header -->

        @include('admin.layout.page-header')
        <!-- /Page Header -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Appoinment</h4>
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
                                    <td>date</td>

 

                                </tr>
                            </thead>
                            <tbody>
                               
        
                                    @forelse ($appoinment_data as $appoinment)
                                    
                                    <tr>
                                        @if (Auth::guard('doctor')->user()->name==$appoinment->doctor && $appoinment->status=='Done')
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{$appoinment->name}}</td>
                                        <td>{{$appoinment->email}}</td>
                                        <td>{{$appoinment->cell}}</td>
                                        <td>{{$appoinment->date}}</td>
                                        
                                        
                                        
    
                                        
                                        
                                        @endif
                                   
                                        
                                    
                                        
                                        @empty
                                        <tr>
                                            <td colspan="8" class="text-center">
                                                <p >No appoinment data found</p>
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
