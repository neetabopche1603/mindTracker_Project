@extends('partials.backend.app')
@section('adminTitle','Brain Blances Contents')
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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Brain Balance > Contents</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <a href="{{route('admin.brainBalContentAddFrom')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add Contents</a>

            </div>
        </div>
    </div>
    <!-- Simple Datatable start -->
    <div class="card-box mb-30">
        @include('partials.alertMessages')
        <div class="pd-20">
            <h4 class="text-blue h4">Contents List</h4>
            <h4 class="text-blue h4">View All BrainBalance Contents List</h4>
        </div>
        {{-- <a href="javascript:void(0)" class="btn btn-danger m-3" id="deleteAll">Delete All</a> --}}
        <div class="pb-20 table-responsive">
        
            <table id="contents" class="table table-bordered yajra-datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        {{-- <th>Images</th>
                        <th>Files</th> --}}
                        <th>Sub Category</th>
                        <th>Title</th>
                        <th>Description</th>
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
      
      var table = $('#contents').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('admin.brainBalContent') }}",
          columns: [
              {data: 'id', name: 'id'},
            //   {data: 'images', name: 'images'},
            //   {data: 'files', name: 'files'},
              {data: 'sub_category_name', name: 'sub_category_name'},
              {data: 'sub_cate_title', name: 'sub_cate_title'},
              {data: 'description', name: 'description'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
      
    });
  </script>
           

@endpush