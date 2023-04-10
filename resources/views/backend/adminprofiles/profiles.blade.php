@extends('partials.backend.app')
@section('adminTitle', 'Admin Profile Page')
@section('container')

    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Profile</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
                    <div class="pd-20 card-box height-100-p">
                        <div class="profile-photo">
                            <a href="modal" data-toggle="modal" data-target="#modal" >
                                <img src="{{$admin->avatar}}" alt="Avatar" class="avatar-photo img-thumbnail text-center ml-lg-4" width="100" height="80">
                            </a>
                           
                            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body text-center ">
                                            <div class="img-container">
                                                <img id="image" src="{{$admin->avatar}}" alt="Picture">
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
                        <h5 class="text-center h5 mb-0">{{$admin->name}}</h5>
                        <p class="text-center text-muted font-14">Admin</p>
                        <div class="profile-info">
                            <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                            <ul>
                                <li>
                                    <span>Email Address:</span>
                                    {{$admin->email}}
                                </li>
                                <li>
                                    <span>Phone Number:</span>
                                    {{$admin->number}}
                                </li>

                                <li>
                                    <span>Address:</span>
                                    {!! $admin->address !!}
                                </li>
                            </ul>
                        </div>
                        <div class="profile-social">
                            <h5 class="mb-20 h5 text-blue">Social Links</h5>
                            <ul class="clearfix">
                                <li><a href="#" class="btn" data-bgcolor="#3b5998" data-color="#ffffff"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="btn" data-bgcolor="#1da1f2" data-color="#ffffff"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="btn" data-bgcolor="#007bb5" data-color="#ffffff"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#" class="btn" data-bgcolor="#f46f30" data-color="#ffffff"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
                    <div class="card-box height-100-p overflow-hidden">
                        <div class="profile-tab height-100-p">
                            <div class="tab height-100-p">
                                <ul class="nav nav-tabs customtab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#setting" role="tab">Settings</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
    
                                    <!-- Setting Tab start -->
                                        <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                        <div class="profile-setting">
                                                <ul class="profile-edit-list row">
                                                    <li class="weight-500 col-md-6">
                                                        <h4 class="text-blue h5 mb-20">Edit Your Personal Profile</h4>
                                                        {{-- Alert Messages Start --}}
                                                        @if ($deleteMsg = Session::get('success'))
                                                        <div class="alert alert-success alert-block">
                                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                                            <strong>{{ $deleteMsg }}</strong>
                                                        </div>
                                                        @endif
                                                        {{-- Alert Messages End --}}

                                                        <form method="post" action="{{route('admin.adminprofileUpdate')}}" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$admin->id}}">
                                                        <div class="form-group">
                                                            <label>Full Name</label>
                                                            <input class="form-control form-control-lg" type="text" name="name" value="{{$admin->name}}">
                                                        </div>
                                                       
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input class="form-control form-control-lg" type="email" name="email" value="{{$admin->email}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Phone Number</label>
                                                            <input class="form-control form-control-lg" type="text" name="number" value="{{$admin->number}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <textarea class="form-control" name="address">{{$admin->address}}</textarea>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Avatar</label>
                                                            <input class="form-control form-control-lg" type="file" name="avatar" value="">
                                                            @error('avatar')
                                                            <span class="text-danger">
                                                             {{$message}}
                                                            </span>
                                                            @enderror
                                                            
                                                        </div>
                                                       
                                                        <div class="form-group mb-0">
                                                            <input type="submit" class="btn btn-primary" value="Update Information">
                                                        </div>
                                                    </form>
                                                    </li>
                                            
                                                    <li class="weight-500 col-md-6">
                                                        <h4 class="text-blue h5 mb-20">Change Password</h4>
                                                          {{-- Alert Messages Start --}}
                                                          @if ($deleteMsg = Session::get('password'))
                                                          <div class="alert alert-warning alert-block">
                                                              <button type="button" class="close" data-dismiss="alert">×</button>
                                                              <strong>{{ $deleteMsg }}</strong>
                                                          </div>
                                                          @endif
                                                          {{-- Alert Messages End --}}
                                                    <form method="post" action="{{route('admin.adminChangePassword')}}">
                                                        @csrf
                                                        <input type="hidden" name="email" value="{{$admin->email}}">
                                                        <div class="form-group">
                                                            <label>Old Password:</label>
                                                            <input class="form-control form-control-lg" type="password"  name="current_password" placeholder="Old Password here">
                                                            <span class="text-danger">
                                                                @error('current_password')
                                                                    {{$message}}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                     
                                                        <div class="form-group">
                                                            <label>New Password:</label>
                                                            <input class="form-control form-control-lg" type="password" name="password" placeholder="New Password here">
                                                            <span class="text-danger">
                                                                @error('password')
                                                                    {{$message}}
                                                                @enderror
                                                            </span>
                                                        </div>
                                    
                                                        <div class="form-group">
                                                            <label>Confirm Password:</label>
                                                            <input class="form-control form-control-lg" type="password" name="password_confirmation" placeholder="New Password here">
                                                            <span class="text-danger">
                                                                @error('password_confirmation')
                                                                    {{$message}}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <input type="submit" class="btn btn-primary" value="Update Password">
                                                        </div>

                                                    </form>
                                                    </li>
                                                </ul>
                                        </div>
                                    </div>
                                    <!-- Setting Tab End -->


                                     <!-- Setting Tab start -->
                                     <div class="tab-pane fade show active" id="setting" role="tabpanel">
                                        <div class="profile-setting">
                                                <ul class="profile-edit-list row">
                                                    <li class="weight-500 col-md-6">
                                                        <h4 class="text-blue h5 mb-20">Edit Your Website Setting</h4>
                                                        {{-- Alert Messages Start --}}
                                                        @if ($deleteMsg = Session::get('success'))
                                                        <div class="alert alert-success alert-block">
                                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                                            <strong>{{ $deleteMsg }}</strong>
                                                        </div>
                                                        @endif
                                                        {{-- Alert Messages End --}}
                                                        <form method="post" action="#" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="id" value="">
                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <input class="form-control form-control-lg" type="text" name="website_title" value="">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Favicon</label>
                                                            <input class="form-control form-control-lg" type="file" name="website_favicon" value="">
                                                            <img src="" alt="Favicon">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Logo</label>
                                                            <input class="form-control form-control-lg" type="file" name="website_logo" value="">
                                                            <img src="" alt="Logo">
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <input type="submit" class="btn btn-primary" value="Update Setting">
                                                        </div>
                                                    </form>
                                                    </li>
                                                </ul>
                                        </div>
                                    </div>
                                    <!-- Setting Tab End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>

@endsection

