@extends('partials.backend.app')
@section('adminTitle', 'View Reviews')
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
                            <li class="breadcrumb-item active" aria-current="page">Reviews</li>
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
                    {{-- <h4 class="text-blue h4">View Reviews</h4> --}}
                    {{-- <p class="mb-30">Details Form</p> --}}
                </div>
                <div class="pull-right">
                    <a href="javascript:void(0);" onclick="window.history.back()"
                        class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="collapse" role="button"><i
                            class="fa fa-backward" aria-hidden="true"></i> Back</a>
                </div>
            </div>
                <div class="card mt-2">
                    <div class="card-header">
                        <h4 class="">Reviews & Rating</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Therapist :</label>
                            <div class="col-sm-12 col-md-10">
                              <strong class="text-dark"> 
                                {{ isset($reviews[0]->therapist_name) ? $reviews[0]->therapist_name : '' }}
                            </strong>
                               
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">User :</label>
                            <div class="col-sm-12 col-md-10">
                                <strong class="text-dark"> 
                                    {{ isset($reviews[0]->user_name) ? $reviews[0]->user_name : '' }}
                                </strong>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Rating :</label>
                            <div class="col-sm-12 col-md-10">
                                <strong class="text-dark"> 
                                {{ isset($reviews[0]->rating) ? $reviews[0]->rating : '' }}
                                
                                </strong>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Reviews :</label>
                            <div class="col-sm-12 col-md-10">
                                <p class="text-black"> 
                                {!! isset($reviews[0]->review) ? $reviews[0]->review : '' !!}

                                </p>
                            </div>
                        </div>

                    </div>
                </div>
        </div>

        </code></pre>
    </div>
    </div>
    </div>
    <!-- Default Basic Forms End -->

    </div>

@endsection
