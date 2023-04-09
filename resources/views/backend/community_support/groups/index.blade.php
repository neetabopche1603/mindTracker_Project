@extends('partials.backend.app')
@section('adminTitle', 'Community Support Groups List')
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
                            <li class="breadcrumb-item active" aria-current="page">Community Support >Groups List</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a href="{{ route('admin.communityGroupAddForm') }}" class="btn btn-primary"><i class="fa fa-plus"
                            aria-hidden="true"></i> Add Group</a>

                </div>
            </div>
        </div>
        <!-- Simple Datatable start -->
        <div class="card-box mb-30">
            @include('partials.alertMessages')
            <div class="pd-20">
                <h4 class="text-blue h4">Groups List</h4>
                <h4 class="text-blue h4">View All Groups List</h4>
            </div>
            {{-- <a href="javascript:void(0)" class="btn btn-danger m-3" id="deleteAll">Delete All</a> --}}
            <div class="pb-20 table-responsive">

                <table id="communityGroups" class="table table-bordered yajra-datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Icon</th>
                            <th>Group Name</th>
                            <th>Total Group Member</th>
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
        $(function() {

            var table = $('#communityGroups').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.communityGroups') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'group_icon',
                        name: 'group_icon'
                    },
                    {
                        data: 'group_name',
                        name: 'group_name'
                    },
                    {
                        data: 'count_member',
                        name: 'count_member'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                initComplete: function() {
                    // Custom JS Load After Yajra Table
                    $('.grpsIconPopup').click(function() {
                        var src = $(this).attr('src');
                        $('<div>').addClass('dialog-box')
                            .append($('<img>').attr('src', src))
                            .dialog({
                                modal: true,
                                title: $(this).attr('alt'),
                                width: 500,
                                height: 400,
                                close: function() {
                                    $(this).dialog('destroy').remove();
                                }
                            });
                    });
                }
            });

        });
    </script>

@endpush
