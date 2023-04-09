@extends('partials.backend.app')
@section('adminTitle', 'View Appointments')
@section('container')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Details Form</h4>
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
                    <h4 class="text-blue h4">View Appointments</h4>
                    <p class="mb-30">Appointments Details</p>
                </div>
                <div class="pull-right">
                    <a href="javascript:void(0);" onclick="window.history.back()"
                        class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="collapse" role="button"><i
                            class="fa fa-backward" aria-hidden="true"></i> Back</a>
                </div>
            </div>
            <form method="post" action="#" type="multfor">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">User :</label>
                    <div class="col-sm-12 col-md-10">
                        <strong>{{$appointmentsView->name}}</strong>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Therapist :</label>
                    <div class="col-sm-12 col-md-10">
                        <strong>{{$appointmentsView->name}}</strong>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Date :</label>
                    <div class="col-sm-12 col-md-10">
                        <strong>{{$appointmentsView->date}}</strong>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Time:</label>
                    <div class="col-sm-12 col-md-10">
                        <strong>{{$appointmentsView->time}}</strong>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Booking Status :</label>
                    <div class="col-sm-12 col-md-10">
                        @if ($appointmentsView->booking_status== 'upcoming')
                        <span class="badge badge-info">Upcoming</span>
                        @elseif ($appointmentsView->booking_status == 'cancel')
                        <span class="badge badge-danger">Cancel</span>
                        @else
                        <span class="badge badge-success">Completed</span>
                        @endif
                    </div>
                </div>
            </form>
        </div>



        </code>
    </pre>
    </div>
    </div>
    </div>
    <!-- Default Basic Forms End -->

    </div>

@endsection
