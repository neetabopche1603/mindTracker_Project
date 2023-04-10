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
                            <li class="breadcrumb-item active" aria-current="page">Community > Edit Post</li>
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
            <form method="post" action="{{ route('admin.communityPostUpdate') }}" type="multfor"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $groupPostEdit->id }}">

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Groups : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <select class="form-control" name="group_id" id="">
                            <option value="" selected disabled>Select Groups</option>
                            @foreach ($groups as $group)
                                <option value="{{ $group->id }}" {{ $group->id == $groupPostEdit->community_group_id ? 'selected' : '' }}>
                                    {{ $group->group_name }}</b></option>
                            @endforeach
                        </select>
                        <span class="text-danger">
                            @error('group_id')
                                {{ $message }}
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
                                <option value="{{ $user->id }}" {{ $user->id == $groupPostEdit->user_id ? 'selected' : '' }}>
                                    {{ $user->name }}</b></option>
                            @endforeach
                        </select>
                        <span class="text-danger">
                            @error('user_id')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Posts : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <textarea cols="80" id="editor1" name="post_text" value=""
                            rows="10">{{ $groupPostEdit->grpPost_text }}</textarea>
                        <span class="text-danger">
                            @error('post_text')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Upload Files :</label>
                    <div class="col-sm-8 col-md-8 fallback">
                        <div class="row">
                            <div class="col-8">
                                <input type="file" name="post_files[]" class="form-control" multiple>
                            </div>
                            <div class="col-4">
                                @php
                                    $files = json_decode($groupPostEdit->grpPostFiles);
                                @endphp

                                @if ($files != '' || $files != null)
                                    @forelse ($files as $file)
                                        @php $filetype = mime_content_type(public_path().'/community_group/posts/'.$file); @endphp

                                        @if (strpos($filetype, 'audio') !== false)
                                            <audio src="{{ asset('community_group/posts') }}/{{ $file }}"
                                                controls></audio>
                                        @elseif (strpos($filetype, 'video') !== false)
                                            <p>Video</p>
                                        @else
                                            <img src="{{ asset('community_group/posts') }}/{{ $file }}" alt="Files"
                                                srcset="" class="img-thumbnail" width="70px" height="50px">
                                        @endif
                                    @empty
                                        <p>No files found.</p>
                                    @endforelse
                                @endif
                            </div>
                        </div>
                        <span class="text-danger">
                            @error('post_files')
                                {{ $message }}
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
