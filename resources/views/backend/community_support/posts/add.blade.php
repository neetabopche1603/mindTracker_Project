@extends('partials.backend.app')
@section('adminTitle', 'Community Group Post')
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
                            <li class="breadcrumb-item active" aria-current="page">Group >Add Post</li>
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
                    <h4 class="text-blue h4">Add Post</h4>
                    <p class="mb-30">Add To Form Details</p>
                </div>
                <div class="pull-right">
                    <a href="javascript:void(0);" onclick="window.history.back()"
                        class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="collapse" role="button"><i
                            class="fa fa-backward" aria-hidden="true"></i> Back</a>
                </div>
            </div>
            <form method="post" action="{{route('admin.communityPostStore')}}" type="multfor" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Groups : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <select class="form-control" name="group_id" id="">
                            <option value="" selected disabled>Select Group</option>
                            @foreach ($groups as $group)
                            <option value="{{$group->id}}">{{$group->group_name}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">
                            @error('group_id')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">User : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <select class="form-control" name="user_id" id="">
                            <option value="" selected disabled>Select Users</option>
                            @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
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
                    <label class="col-sm-12 col-md-2 col-form-label">Posts : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <textarea cols="80" id="editor1" value="{{ old('post_text') }}" name="post_text" value="" rows="10"></textarea>
                        <span class="text-danger">
                            @error('post_text')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Upload Files :</label>
                    <div class="col-sm-12 col-md-10 fallback">
                        <input type="file" name="post_files[]" multiple class="form-control">
                        <span class="text-danger">
                            @error('post_files')
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
