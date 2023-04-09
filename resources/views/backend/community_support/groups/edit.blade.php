@extends('partials.backend.app')
@section('adminTitle', 'Edit Post')
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
                            <li class="breadcrumb-item active" aria-current="page">Journal > Edit Post</li>
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
                    <h4 class="text-blue h4">Edit Post</h4>
                    <p class="mb-30">Edit To Form Details</p>
                </div>
                <div class="pull-right">
                    <a href="javascript:void(0);" onclick="window.history.back()"
                        class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="collapse" role="button"><i
                            class="fa fa-backward" aria-hidden="true"></i> Back</a>
                </div>
            </div>
            <form method="post" action="{{route('admin.communityGroupUpdate')}}" type="multfor" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$groupPostEditForm->id}}">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Group Name : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                       <input type="text" name="group_name" class="form-control" value="{{$groupPostEditForm->group_name}}">
                        <span class="text-danger">
                            @error('group_name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
        
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Upload Icon :</label>
                    <div class="col-sm-10 col-md-10 fallback">
                        <input type="file" name="group_icon" class="form-control">
                        <span class="text-danger">
                            @error('group_icon')
                            {{$message}}
                            @enderror
                        </span>
                        <div class="col-sm-10 col-md-10 fallback">
                            <img src="{{asset('community_support/group_icons/')}}/{{$groupPostEditForm->group_icon}}" alt="groupIcon" width="150" height="70">
                           </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Status : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <div class="custom-control custom-radio mb-5">
                            <input type="radio" id="customRadio1" name="status" value="0" class="custom-control-input"  @if ($groupPostEditForm->status == 0) checked @endif>
                            <label class="custom-control-label" for="customRadio1">BLOCK</label>
                        </div>
                        <div class="custom-control custom-radio mb-5">
                            <input type="radio" id="active" name="status" value="1"  class="custom-control-input"  @if ($groupPostEditForm->status == 1) checked @endif>
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

@push('script')
    <!-- CK EDITOR SCRIPT START -->
    <script>
        // We need to turn off the automatic editor creation first.
        CKEDITOR.disableAutoInline = true;

        CKEDITOR.replace('post_text');
    </script>
    <!-- CK EDITOR SCRIPT  -->
    @endpush
