@extends('partials.backend.app')
@section('adminTitle', 'Users Add Form')
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
                            <li class="breadcrumb-item active" aria-current="page">Users >Users List</li>
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
                    <h4 class="text-blue h4">Add User</h4>
                    <p class="mb-30">Add To Form Details</p>
                </div>
                <div class="pull-right">
                    <a href="javascript:void(0);" onclick="window.history.back()"
                        class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="collapse" role="button"><i
                            class="fa fa-backward" aria-hidden="true"></i> Back</a>
                </div>
            </div>
            <form method="post" action="{{url('admin/users-store')}}" type="multfor" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 col-md-6">
                        <label class="col-form-label">Name : <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <label class="col-form-label">Email : <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <label class="col-form-label">Password : <span
                                class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password" value="">
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <label class="col-form-label">Confirm Password : <span
                                class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password_confirmation" value="">
                        <span class="text-danger">
                            @error('password_confirmation')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <label class="col-form-label">Bio : <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="bio" value="{{old('bio')}}">
                        <span class="text-danger">
                            @error('bio')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <label class="col-form-label">Ocupation : <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="ocupation" value="{{old('ocupation')}}">
                        <span class="text-danger">
                            @error('ocupation')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <label class="col-form-label">Mobile Number : <span
                                class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="mobile_number" value="{{old('mobile_number')}}">
                        <span class="text-danger">
                            @error('mobile_number')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <label class="col-form-label">Avatar : <span
                                class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="avatar" value="">
                        <span class="text-danger">
                            @error('avatar')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-sm-12 col-md-12">
                        <label class="col-form-label">Address : <span
                                class="text-danger">*</span></label>
                                <textarea cols="80" id="editor1" value="{{ old('address') }}" name="address" value="" rows="10"></textarea>
                        <span class="text-danger">
                            @error('address')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <label class="col-form-label">Gender : <span class="text-danger">*</span></label>
                        <div class="custom-control custom-radio mb-5">
                            <input type="radio" id="male" name="gender" value="male"
                                class="custom-control-input">
                            <label class="custom-control-label" for="male">Male</label>
                        </div>
                        <div class="custom-control custom-radio mb-5">
                            <input type="radio" id="female" name="gender" value="female"
                                class="custom-control-input">
                            <label class="custom-control-label" for="female">Female</label>
                        </div>
                        <div class="custom-control custom-radio mb-5">
                            <input type="radio" id="other" name="gender" value="other"
                                class="custom-control-input">
                            <label class="custom-control-label" for="other">Other</label>
                        </div>
                        <span class="text-danger">
                            @error('gender')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <label class="col-form-label">Status : <span class="text-danger">*</span></label>
                        <div class="custom-control custom-radio mb-5">
                            <input type="radio" id="block" name="status" value="0"
                                class="custom-control-input">
                            <label class="custom-control-label" for="block">BLOCK</label>
                        </div>
                        <div class="custom-control custom-radio mb-5">
                            <input type="radio" id="active" name="status" value="1"
                                class="custom-control-input" checked>
                            <label class="custom-control-label" for="active">ACTIVE</label>
                        </div>
                        <span class="text-danger">
                            @error('status')
                                {{ $message }}
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
      <!-- CK EDITOR SCRIPT START -->
      <script>
        // We need to turn off the automatic editor creation first.
        CKEDITOR.disableAutoInline = true;

        CKEDITOR.replace('address');
    </script>
    <!-- CK EDITOR SCRIPT  -->
@endpush