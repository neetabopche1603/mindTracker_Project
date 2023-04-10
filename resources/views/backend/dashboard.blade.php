@extends('partials.backend.app')
@section('adminTitle', 'Adminstrator Dashboard')
@section('container')
    <div class="card-box pd-20 height-100-p mb-30">
        @include('partials.alertMessages')
        <div class="row align-items-center">
            <div class="col-md-4">
                <img src="{{ asset('backend/vendors/images/banner-img.png') }}" alt="">
            </div>
            <div class="col-md-8">
                <h4 class="font-20 weight-500 mb-10 text-capitalize">
                    Welcome back <div class="weight-600 font-30 text-blue">Adminstrator !</div>
                </h4>
                <p class="font-18 max-width-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde hic non
                    repellendus debitis iure, doloremque assumenda. Autem modi, corrupti, nobis ea iure fugiat, veniam non
                    quaerat mollitia animi error corporis.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data">
                        <div id="chart"></div>
                    </div>
                    <div class="widget-data">
                        <div class="h4 mb-0">2020</div>
                        <div class="weight-600 font-14">Contact</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data">
                        <div id="chart2"></div>
                    </div>
                    <div class="widget-data">
                        <div class="h4 mb-0">400</div>
                        <div class="weight-600 font-14">Deals</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data">
                        <div id="chart3"></div>
                    </div>
                    <div class="widget-data">
                        <div class="h4 mb-0">350</div>
                        <div class="weight-600 font-14">Campaign</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data">
                        <div id="chart4"></div>
                    </div>
                    <div class="widget-data">
                        <div class="h4 mb-0">$6060</div>
                        <div class="weight-600 font-14">Worth</div>
                    </div>
                </div>
            </div>
        </div>

		{{-- SHOW ALL APPOINTMENT --}}
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="title">
									<h4>Appointments</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.html">Home</a></li>
										<li class="breadcrumb-item active" aria-current="page">Show All Appointments</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
					<div class="pd-20 card-box mb-30">
						<div class="calendar-wrap">
							<div id='calendar'></div>
						</div>
						<!-- calendar modal -->
						<div id="modal-view-event" class="modal modal-top fade calendar-modal">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-body">
										<h4 class="h4"><span class="event-icon weight-400 mr-3"></span><span class="event-title"></span></h4>
										<div class="event-body"></div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
	
						<div id="modal-view-event-add" class="modal modal-top fade calendar-modal">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<form id="add-event">
										<div class="modal-body">
											<h4 class="text-blue h4 mb-10">Add Event Detail</h4>
											<div class="form-group">
												<label>Event name</label>
												<input type="text" class="form-control" name="ename">
											</div>
											<div class="form-group">
												<label>Event Date</label>
												<input type='text' class="datetimepicker form-control" name="edate">
											</div>
											<div class="form-group">
												<label>Event Description</label>
												<textarea class="form-control" name="edesc"></textarea>
											</div>
											<div class="form-group">
												<label>Event Color</label>
												<select class="form-control" name="ecolor">
													<option value="fc-bg-default">fc-bg-default</option>
													<option value="fc-bg-blue">fc-bg-blue</option>
													<option value="fc-bg-lightgreen">fc-bg-lightgreen</option>
													<option value="fc-bg-pinkred">fc-bg-pinkred</option>
													<option value="fc-bg-deepskyblue">fc-bg-deepskyblue</option>
												</select>
											</div>
											<div class="form-group">
												<label>Event Icon</label>
												<select class="form-control" name="eicon">
													<option value="circle">circle</option>
													<option value="cog">cog</option>
													<option value="group">group</option>
													<option value="suitcase">suitcase</option>
													<option value="calendar">calendar</option>
												</select>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary" >Save</button>
											<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
    </div>


	
@endsection
