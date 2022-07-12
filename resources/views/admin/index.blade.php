@extends('admin.layout.app')

@section('main-content')
<div class="page-wrapper">
			
    <div class="content container-fluid">
        
        <!-- Page Header -->

        @include('admin.layout.page-header')
        <!-- /Page Header -->
        <!-- Sidebar -->

        <!-- /Sidebar -->

        {{-- dashboard counter  --}}
        @include('admin.layout.dash-count')
        @if (Auth::guard('adminUser')!=false )
            {{-- doctor and patient list  --}}
        @include('admin.layout.list')
        @endif
        
        
        {{-- appointment list  --}}
        @include('admin.layout.appoinment-list')
        
    </div>			
</div>
@endsection