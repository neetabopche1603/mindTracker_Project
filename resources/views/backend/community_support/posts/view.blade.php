@extends('partials.backend.app')
@section('adminTitle', 'View Post')
@section('container')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>View Form</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Community Group > View Post</li>
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
                    <h4 class="text-blue h4">View Post</h4>
                    <p class="mb-30">Details Form</p>
                </div>
                <div class="pull-right">
                    <a href="javascript:void(0);" onclick="window.history.back()"
                        class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="collapse" role="button"><i
                            class="fa fa-backward" aria-hidden="true"></i> Back</a>
                </div>
            </div>
            <form method="post" action="#" type="multfor" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$communityPosts->id}}">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Group :</label>
                    <div class="col-sm-12 col-md-10">
                      <p>{{ $communityPosts->group_name}}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">User :</label>
                    <div class="col-sm-12 col-md-10">
                      <p>{{ $communityPosts->user_name}}</p>
                    </div>
                </div>
              
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Post Text :</label>
                    <div class="col-sm-12 col-md-10">
                        <p>{!! $communityPosts->grpPost_text !!}</p>
                       
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Total Likes :</label>
                    <div class="col-sm-12 col-md-10">
                        <p>{!! $communityPosts->likesCount !!}</p>
                       
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Post Files :</label>
                    <div class="col-sm-8 col-md-8 fallback">
                        <div class="row">
                            <div class="col-8">
                                {{-- <input type="file" name="post_files[]" class="form-control" multiple> --}}
                            </div>
                            <div class="col-sm-12 col-md-10">
                                @php
                                    $files = json_decode($communityPosts->grpPostFiles);
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
                                            <img src="{{ asset('community_group/posts') }}/{{ $file }}"
                                                alt="Files" srcset="" class="img-thumbnail" width="70px" height="50px">
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
            </form>
        </div>

        </code></pre>
    </div>
    </div>
    </div>
    <!-- Default Basic Forms End -->

    </div>

@endsection
