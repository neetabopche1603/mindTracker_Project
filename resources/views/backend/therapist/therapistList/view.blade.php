@extends('partials.backend.app')
@section('adminTitle', 'View Category (BrainBalance)')
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
                            <li class="breadcrumb-item active" aria-current="page">Brain Balance > Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Default Basic Forms Start -->
       
        <div class="row" >
            <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 mb-50">
                <div class="pd-20 card-box height-100-p">
                    <div class="profile-photo">
                        {{-- <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a> --}}
                        <a href="modal" data-toggle="modal" data-target="#modal" >

                        <img src="{{asset('profilesImages')}}/{{$therapistView->avatar}}" alt="Avatar" class="avatar-photo img-thumbnail" width="100" height="80">

                    </a>
                        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body pd-5">
                                        <div class="img-container text-center">
                                            <h5 class="mb-20 mt-2 h5 text-blue">Profile Picture</h5>
                                            <img id="image" src="{{asset('profilesImages')}}/{{$therapistView->avatar}}" alt="Picture" width="350" height="150">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        {{-- <input type="submit" value="Update" class="btn btn-primary"> --}}
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="text-center h5 mb-0">{{$therapistView->name}}</h5>
                    <p class="text-center text-muted font-14">
                        @if($therapistView->role==1)
                          <b>Therapist</b>
                      @endif
                    </p>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 mb-50">
                            <div class="profile-info">
                                <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                                <ul>
                                    <li>
                                        <span>Email Address:</span>
                                        {{$therapistView->email}}
                                    </li>
                                    <li>
                                        <span>Phone Number:</span>
                                        {{$therapistView->mobile_number}}
                                    </li>
                                    <li>
                                        <span>Address:</span>
                                        {!! $therapistView->address !!}
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 mb-50">
                            <div class="profile-info">
                                {{-- <h5 class="mb-20 h5 text-blue">Contact Information</h5> --}}
                                <br>
                                <ul>
                                    <li>
                                        <span>Bio:</span>
                                        {{$therapistView->bio}}
                                    </li>
                                    <li>
                                        <span>Ocupation:</span>
                                        {{$therapistView->ocupation}}
                                    </li>
                                    <li>
                                        <span>Gender:</span>
                                        {!! $therapistView->gender !!}
        
                                    </li>
                                    <li>
                                        <span>status:</span>
                                      @if ($therapistView->status==1)
                                      <b class="badge badge-success">Active</b>
                                      @else
                                      <b class="badge badge-success">Block</b>
                                      @endif
        
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                  
                    {{-- <div class="profile-social">
                        <h5 class="mb-20 h5 text-blue">Social Links</h5>
                        <ul class="clearfix">
                            <li><a href="#" class="btn" data-bgcolor="#3b5998" data-color="#ffffff"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="btn" data-bgcolor="#1da1f2" data-color="#ffffff"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="btn" data-bgcolor="#007bb5" data-color="#ffffff"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" class="btn" data-bgcolor="#f46f30" data-color="#ffffff"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" class="btn" data-bgcolor="#c32361" data-color="#ffffff"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#" class="btn" data-bgcolor="#3d464d" data-color="#ffffff"><i class="fa fa-dropbox"></i></a></li>
                            <li><a href="#" class="btn" data-bgcolor="#db4437" data-color="#ffffff"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="btn" data-bgcolor="#bd081c" data-color="#ffffff"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a href="#" class="btn" data-bgcolor="#00aff0" data-color="#ffffff"><i class="fa fa-skype"></i></a></li>
                            <li><a href="#" class="btn" data-bgcolor="#00b489" data-color="#ffffff"><i class="fa fa-vine"></i></a></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
         
        </div>
        </code>
    </pre>
    </div>
    </div>
    </div>
    <!-- Default Basic Forms End -->

    </div>

@endsection
