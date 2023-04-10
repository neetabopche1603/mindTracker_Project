@extends('partials.backend.app')
@section('adminTitle', 'Therapist List')
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
                            <li class="breadcrumb-item active" aria-current="page">Therapist > Therapist List</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a href="{{ route('admin.therapistAddForm') }}" class="btn btn-primary"><i class="fa fa-plus"
                            aria-hidden="true"></i> Add Therapist</a>

                </div>
            </div>
        </div>
        <!-- Simple Datatable start -->
        <div class="card-box mb-30">
            @include('partials.alertMessages')
            <div class="pd-20">
                <h4 class="text-blue h4">Therapist List</h4>
                <h4 class="text-blue h4">View All Therapist Lists</h4>
            </div>
            <a href="javascript:void(0)" class="btn btn-danger m-3" id="deleteAll">Delete All</a>

            <div class="pb-20 table-responsive">

                <table id="therapistList" class="table table-bordered yajra-datatable">
                    <thead>
                        <tr>
                            <th>
                                <div class="dt-checkbox">
                                    <input type="checkbox" name="select_all" value="1" id="master">
                                    <span class="dt-checkbox-label"></span>
                                </div>
                            </th>
                            <th>No</th>
                            <th>Name</th>
                            <th>email</th>
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
            var table = $('#therapistList').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.therapist') }}",
                columns: [{
                        data: 'checkbox',
                        name: 'checkbox',
                        orderable: false,
                    },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
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
                    $('#master').on('click', function(e) {
                        if ($(this).is(':checked', true)) {
                            $(".sub_chk").prop('checked', true);
                        } else {
                            $(".sub_chk").prop('checked', false);
                        }
                    });

                    $(document).on('click', '#deleteAll', function(e) {
                        e.preventDefault();
                        var allVals = [];
                        $(".sub_chk:checked").each(function() {
                            allVals.push($(this).attr('data-id'));
                        });

                        if (allVals.length > 0) {
                            Swal.fire({
                                title: 'Are you sure?',
                                text: "You won't be able to revert this!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, delete it!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                        type: "post",
                                        url: "{{ route('admin.therapistDestroy') }}",
                                        data: {
                                            "ids": allVals
                                        },
                                        success: function(response) {
                                            Swal.fire(
                                                'Deleted!',
                                                'Your data has been deleted.',
                                                'success'
                                            );
                                            $("#master").is(':checked', false)
                                            table
                                        .draw(); // Redraw the table to update the data
                                        }
                                    });
                                }
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Please select at least one record!',
                            })
                        }
                    });


                }

            });

        });
    </script>
@endpush
