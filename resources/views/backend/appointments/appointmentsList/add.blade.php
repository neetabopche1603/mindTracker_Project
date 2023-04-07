@extends('partials.backend.app')
@section('adminTitle', 'Add Appointments')
@section('container')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Add Form</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Appointments</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Default Basic Forms Start -->
        <div class="pd-20 card-box mb-30" style="padding-bottom: 50px">
            @include('partials.alertMessages')
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Add Appointments</h4>
                    <p class="mb-30">Add To Form Details</p>
                </div>
                <div class="pull-right">
                    <a href="javascript:void(0);" onclick="window.history.back()"
                        class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="collapse" role="button"><i
                            class="fa fa-backward" aria-hidden="true"></i> Back</a>
                </div>
            </div>

            <form method="post" action="{{route('admin.appointmentsStore')}}" type="multfor">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">User : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <select class="form-control" name="user_id" id="">
                            <option value="" selected disabled>Select Users</option>
                            @foreach ($users as $user)
                            <option value="{{$user->id}}" >{{$user->name}}</b></option>
                            @endforeach
                        </select>
                        <span class="text-danger">
                            @error('user_id')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Tharapist : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <select class="form-control" name="therapist_id" id="">
                            <option value="" selected disabled>Select Tharapist</option>
                            @foreach ($therapist as $therapisData)
                            <option value="{{$therapisData->id}}">{{$therapisData->name}}</b></option>
                            @endforeach
                        </select>
                        <span class="text-danger">
                            @error('therapist_id')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Date : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <input type="text" class="form-control appointmentDatePicker" id="appointmentDatePicker" name="appointmentDate" value="{{old('appointmentDate')}}" placeholder="Select Date">
                       {{-- DATE TIME SELECT
                        <input class="form-control datetimepicker" placeholder="Choose Date anf time" type="text">
                        --}}
                        <span class="text-danger">
                            @error('appointmentDate')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Time : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <input type="text" class="form-control time-picker" name="appointmentTime" value="{{old('appointmentTime')}}" placeholder="Select time" >
                        <span class="text-danger">
                            @error('appointmentTime')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="float-right">
                    <input type="submit" class="btn btn-warning" value="Save">
                </div>

            </form>
        </div>

        </code></pre>
    </div>
    </div>
    </div>
    <!-- Default Basic Forms End -->
    </div>

@endsection
@push('script')
<script>
    $('#appointmentDatePicker').datepicker({
		minDate: new Date(),
		language: 'en',
		autoClose: true,
		dateFormat: 'dd MM yyyy',
	});
</script>
@endpush
