@extends('partials.backend.app')
@section('adminTitle','Onboarding Questions')
@section('container')

<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Table</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Onboarding</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <a href="{{route('admin.onboardingQuesAddFrom')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                <a href="{{route('admin.onboardingQuesEditFrom',1)}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Edit</a>

                <!-- <div class="dropdown">
                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        January 2018
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Export List</a>
                        <a class="dropdown-item" href="#">Policies</a>
                        <a class="dropdown-item" href="#">View Assets</a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Simple Datatable start -->
    <div class="card-box mb-30">
        @include('partials.alertMessages')
        <div class="pd-20">
            <h4 class="text-blue h4">Onboarding</h4>
            <h4 class="text-blue h4">View All Onboarding Questions List</h4>
        </div>
        <a href="javascript:void(0)" class="btn btn-danger m-3" id="deleteAll">Delete All</a>
        <div class="pb-20 table-responsive">
            <table id="onboarding" class="table table-bordered yajra-datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Questions</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
@push('script')
<script type="text/javascript">
    $(function () {
      
      var table = $('#onboarding').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('admin.onboardingQueIndex') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'questions', name: 'questions'},
              {data: 'status', name: 'status'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
      
    });
  </script>
           

@endpush