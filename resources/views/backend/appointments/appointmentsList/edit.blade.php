@extends('partials.backend.app')
@section('adminTitle', 'Edit Appointments')
@section('container')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Edit Form</h4>
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
                    <h4 class="text-blue h4">Edit Appointments</h4>
                    <p class="mb-30">Edit To Form Details</p>
                </div>
                <div class="pull-right">
                    <a href="javascript:void(0);" onclick="window.history.back()"
                        class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="collapse" role="button"><i
                            class="fa fa-backward" aria-hidden="true"></i> Back</a>
                </div>
            </div>

            <form method="post" action="{{route('admin.appointmentsUpdate')}}" type="multfor">
                @csrf
                <input type="hidden" name="id" value="{{$appointmentsEdit->id}}">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">User : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <select class="form-control" name="user_id" id="">
                            <option value="" selected disabled>Select Users</option>
                            @foreach ($users as $user)
                            <option value="{{$user->id}}" {{$user->id==$appointmentsEdit->user_id?'selected':''}}  >{{$user->name}}</b></option>
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
                            <option value="{{$therapisData->id}}" {{$therapisData->id==$appointmentsEdit->therapist_id ?'selected':''}}  >{{$therapisData->name}}</b></option>
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
                    <label class="col-sm-12 col-md-2 col-form-label">Date : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <input type="text" class="form-control date-picker" name="date" value="{{$appointmentsEdit->date}}" placeholder="Select Date">
                       {{-- DATE TIME SELECT
                        <input class="form-control datetimepicker" placeholder="Choose Date anf time" type="text">
                        --}}
                        <span class="text-danger">
                            @error('date')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Time : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <input type="text" class="form-control time-picker" name="time" value="{{$appointmentsEdit->time}}" placeholder="Select time" >
                        <span class="text-danger">
                            @error('time')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Status : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <div class="custom-control custom-radio mb-5">
                            <input type="radio" id="customRadio1" name="booking_status" value="upcomming" class="custom-control-input"  @if ($appointmentsEdit->booking_status == 'upcomming') checked @endif>
                            <label class="custom-control-label" for="customRadio1">Upcomming</label>
                        </div>
                        <div class="custom-control custom-radio mb-5">
                            <input type="radio" id="customRadio2" name="booking_status" value="cancel"  class="custom-control-input"  @if ($appointmentsEdit->booking_status == 'cancel') checked @endif>
                            <label class="custom-control-label" for="customRadio2">Cancel</label>
                        </div>

                        <div class="custom-control custom-radio mb-5">
                            <input type="radio" id="customRadio3" name="booking_status" value="completed"  class="custom-control-input"  @if ($appointmentsEdit->booking_status == 'completed') checked @endif>
                            <label class="custom-control-label" for="customRadio3">Completed</label>
                        </div>
                        <span class="text-danger">
                            @error('booking_status')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="float-right">
                    <input type="submit" class="btn btn-warning" value="Update">
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
