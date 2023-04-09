@extends('partials.backend.app')
@section('adminTitle', 'Add Groups')
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
                            <li class="breadcrumb-item active" aria-current="page">Community Support > Add Groups</li>
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
                    <h4 class="text-blue h4">Add Groups</h4>
                    <p class="mb-30">Add To Form Details</p>
                </div>
                <div class="pull-right">
                    <a href="javascript:void(0);" onclick="window.history.back()"
                        class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="collapse" role="button"><i
                            class="fa fa-backward" aria-hidden="true"></i> Back</a>
                </div>
            </div>
            <form method="post" action="{{route('admin.communityGroupStore')}}" type="multfor" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Group Name : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                       <input type="text" name="group_name" class="form-control" value="{{old('group_name')}}">
                        <span class="text-danger">
                            @error('group_name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
        
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Upload Icon :</label>
                    <div class="col-sm-12 col-md-10 fallback">
                        <input type="file" name="group_icon" class="form-control">
                        <span class="text-danger">
                            @error('group_icon')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Status : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <div class="custom-control custom-radio mb-5">
                            <input type="radio" id="block" name="status" value="0" class="custom-control-input">
                            <label class="custom-control-label" for="block">BLOCK</label>
                        </div>
                        <div class="custom-control custom-radio mb-5">
                            <input type="radio" id="active" name="status" value="1"  class="custom-control-input" checked>
                            <label class="custom-control-label" for="active">ACTIVE</label>
                        </div>
                        <span class="text-danger">
                            @error('status')
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
    <!-- CK EDITOR SCRIPT START -->
    <script>
        // We need to turn off the automatic editor creation first.
        CKEDITOR.disableAutoInline = true;

        CKEDITOR.replace('post_text');
    </script>
    <!-- CK EDITOR SCRIPT  -->
    @endpush
