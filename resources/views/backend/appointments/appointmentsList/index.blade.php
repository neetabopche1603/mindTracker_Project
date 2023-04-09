@extends('partials.backend.app')
@section('adminTitle', 'Appointments')
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
                            <li class="breadcrumb-item active" aria-current="page">Appointments > Appointments</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a href="{{ route('admin.appointmentsAddForm') }}" class="btn btn-primary"><i class="fa fa-plus"
                            aria-hidden="true"></i> Book Appointment</a>
                </div>
            </div>
        </div>
        <!-- Simple Datatable start -->
        <div class="card-box mb-30">
            @include('partials.alertMessages')
            <div class="pd-20">
                <h4 class="text-blue h4">Appointments List</h4>
            </div>
            <div class="pd-20">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <form>
                            <div class="form-group">
                                <label>Date Filter (Datedpicker Range View)</label><br>
                                {{-- <input class="form-control datetimepicker-range" placeholder="Select Date" type="text"> --}}
                                <input type="text" id="min-date" name="min-date" />
                                <input type="text" id="max-date" name="max-date" />
                            </div>
                        </form>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <form>
                            <div class="form-group">
                                <label>Status Filter</label><br>
                                <select class="form-control" name="appointment_status" id="appointment_statusFilter">
                                    <option value=""selected disabled>Select Status</option>
                                    <option value="">All</option>
                                    <option value="upcoming">Upcoming</option>
                                    <option value="cancel">Cancel</option>
                                    <option value="completed">Completed</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            {{-- <a href="javascript:void(0)" class="btn btn-danger m-3" id="deleteAll">Delete All</a> --}}
            <div class="pb-20 table-responsive">

                <table id="appointments" class="table table-bordered yajra-datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User Name</th>
                            <th>Therapist Name</th>
                            <th>Booking Status</th>
                            <th>Date</th>
                            <th>Time</th>
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

        let table = $('#appointments').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.appointments') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'user_name',
                    name: 'user_name'
                },
                {
                    data: 'therapist_name',
                    name: 'therapist_name'
                },
                {
                    data: 'booking_status',
                    name: 'booking_status'
                },
                {
                    data: 'date',
                    name: 'date'
                },
                {
                    data: 'time',
                    name: 'time'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        $('#appointment_statusFilter').on('change', function() {
            var status = $(this).val();
            table.column(3).search(status)
                .draw(); // assuming the status column is the fourth column (index 3)
        });

        $('#min-date,#max-date').datepicker({
            language: 'en',
            autoClose: true,
            dateFormat: 'dd MM yyyy',
            onSelect: function(dateText, inst) {
                filterTable();
            }
        });

        function filterTable() {
            var minDate = $('#min-date').val();
            var maxDate = $('#max-date').val();
            console.log(minDate, maxDate);
            table.columns(4).search(minDate+','+maxDate).draw();
        }

    });
</script>


@endpush
