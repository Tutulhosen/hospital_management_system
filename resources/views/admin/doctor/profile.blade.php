@extends('admin.layout.app')

@section('main-content')
<div class="page-wrapper">
			
    <div class="content container-fluid">
        
        <!-- Page Header -->

        @include('admin.layout.page-header')
        <!-- /Page Header -->
        <div class="row">
			<div class="col-md-12">
				<div class="profile-header">
					<div class="row align-items-center">
						<div class="col-auto profile-image">
							<a href="#">
								
								@if (Auth::guard('doctor')->user()->photo=='avatar.png')
								<img style="width: 100px;height:100px;border-radius:50%" class="rounded-circle" alt="User Image" src="{{url('avatar.png')}}">
								@else
								<img style="width: 100px;height:100px;border-radius:50%" class="rounded-circle" alt="User Image" src="{{url('storage/doctor/' . Auth::guard('doctor')->user()->photo)}}">
								@endif
							</a>
						</div>
						<div class="col ml-md-n2 profile-user-info">
							<h4 class="user-name mb-0">{{Auth::guard('doctor')->user()->name}}</h4>
							<h6 class="text-muted">{{Auth::guard('doctor')->user()->email}}</h6>
							<h5 class="text-bold">{{Auth::guard('doctor')->user()->cell}}</h5>
							
						</div>
						<div class="col-auto profile-btn">
							
							<a href="#" class="btn btn-primary">
								Edit
							</a>
						</div>
					</div>
				</div>
				<div class="profile-menu">
					<ul class="nav nav-tabs nav-tabs-solid">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#photo_tab">Upload Profile Photo</a>
						</li>
					</ul>
				</div>	
				<div class="tab-content profile-tab-cont">
					
					<!-- Personal Details Tab -->
					<div class="tab-pane fade show active" id="per_details_tab">
					
						<!-- Personal Details -->
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									@include('validate.validate')
									<div class="card-body">
										<h5 class="card-title d-flex justify-content-between">
											<span>Personal Details</span> 
											<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
										</h5>
										<div class="row">
											<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
											<p class="col-sm-10">{{Auth::guard('doctor')->user()->name}}</p>
										</div>
										
										<div class="row">
											<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email Id</p>
											<p class="col-sm-10">{{Auth::guard('doctor')->user()->email}}</p>
										</div>
										<div class="row">
											<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
											<p class="col-sm-10">{{Auth::guard('doctor')->user()->cell}}</p>
										</div>
										<div class="row">
											<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Post</p>
											<p class="col-sm-10">{{Auth::guard('doctor')->user()->name}}</p>
										</div>
										
									</div>
								</div>
								
								<!-- Edit Details Modal -->
								
								<!-- /Edit Details Modal -->
								
							</div>

						
						</div>
						<!-- /Personal Details -->

					</div>
					<!-- /Personal Details Tab -->
					
					<!-- Change Password Tab -->
					<div id="password_tab" class="tab-pane fade">
					
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Change Password</h5>
								<div class="row">
									<div class="col-md-10 col-lg-6">
										<form action="{{route('doctor.password.change', Auth::guard('doctor')->user()->id)}}" method="POST">
											@csrf
											<div class="form-group">
												<label>Old Password</label>
												<input name="old_password" type="password" class="form-control">
											</div>
											<div class="form-group">
												<label>New Password</label>
												<input name="password" type="password" class="form-control">
											</div>
											<div class="form-group">
												<label>Confirm Password</label>
												<input name="password_confirmation" type="password" class="form-control">
											</div>
											<button class="btn btn-primary" type="submit">Save Changes</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Change Password Tab -->

					<!-- Change profile photo Tab -->
					<div id="photo_tab" class="tab-pane fade">
					
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Upload profile photo</h5>
								
								<div class="row">
									<div class="col-md-10 col-lg-6">
										<form action="{{route('doctor.profile.photo', Auth::guard('doctor')->user()->id)}}" method="POST", enctype="multipart/form-data">
											@csrf
											<div class="form-group">
												<label>Upload photo</label>
												<input name="photo" type="file" >
											</div>
											
											<button class="btn btn-primary" type="submit">Save Changes</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Change profile photo Tab -->
					
				</div>
			</div>
		</div>
        
    </div>			
</div>				
                    
@endsection
