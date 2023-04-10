@extends('partials.backend.app')
@section('adminTitle', 'Edit Content (BrainBalance)')
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
                            <li class="breadcrumb-item active" aria-current="page">Brain Balance > Content</li>
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
                    <h4 class="text-blue h4">Edit Content</h4>
                    <p class="mb-30">Edit To Form Details</p>
                </div>
                <div class="pull-right">
                    <a href="javascript:void(0);" onclick="window.history.back()"
                        class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="collapse" role="button"><i
                            class="fa fa-backward" aria-hidden="true"></i> Back</a>
                </div>
            </div>
            <form method="post" action="{{ route('admin.brainBalContentUpdate') }}" type="multfor"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $contents->id }}">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Sub Categories : <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <select class="form-control" name="subCategory_id" id="">
                            <option value="" selected disabled>Select SubCategory</option>
                            @foreach ($subCategory as $subCate)
                                <option value="{{ $subCate->id }}"
                                    {{ $subCate->id == $contents->subCategory_id ? 'selected' : '' }}>
                                    {{ $subCate->sub_category_name }}</b></option>
                            @endforeach
                        </select>
                        <span class="text-danger">
                            @error('subCategory_id')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Title :</label>
                    <div class="col-sm-12 col-md-10">
                        <input type="text" class="form-control" name="sub_cate_title"
                            value="{{ $contents->sub_cate_title }}">
                        <span class="text-danger">
                            @error('sub_cate_title')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Description : <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <textarea cols="80" id="editor1" name="description" value="" rows="10">{{ $contents->description }}</textarea>
                        <span class="text-danger">
                            @error('description')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Upload Image :</label>
                    <div class="col-sm-8 col-md-8 fallback">
                        <div class="row">
                            <div class="col-8">
                                <input type="file" name="uploadImages" class="form-control">
                            </div>
                            <div class="col-4">
                                <img src="{{ $contents->images }}" alt="Images" srcset="" class="img-thumbnail"
                                    width="70px" height="50px">
                            </div>
                        </div>
                        <span class="text-danger">
                            @error('uploadImages')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Upload Files :</label>
                    <div class="col-sm-8 col-md-8 fallback">
                        <div class="row">
                            <div class="col-sm-6 col-md-10">
                                <input type="file" name="uploadfiles[]" class="form-control" multiple>
                                <div id="filesData" style="display: flex;gap:10px;">
                                    @php
                                        $files = json_decode($contents->files);
                                    @endphp
                                    @if ($files != '' || $files != null)
                                        @forelse ($files as $key=>$file)
                                            @php $filetype = mime_content_type(public_path().'/brainBalanceFiles/files/'.$file); @endphp

                                            @if (strpos($filetype, 'audio') !== false)
                                                <div id="img{{ $key }}" style="border:1px solid black">
                                                    <audio
                                                        src="{{ asset('brainBalanceFiles/files') }}/{{ $file }}"
                                                        controls></audio>
                                                    <a href="javascript:void(0)" class="text-danger imgRemove"
                                                        data-key="{{ $key }}" data-id="{{ $contents->id }}"
                                                        data-name="{{ $file }}"><i class="fa fa-times"></i></a>
                                                </div>
                                            @elseif (strpos($filetype, 'video') !== false)
                                                <p>Video</p>
                                                <a href="javascript:void(0)" class="text-danger imgRemove"
                                                    data-key="{{ $key }}" data-id="{{ $contents->id }}"
                                                    data-name="{{ $file }}"><i class="fa fa-times"></i></a>
                                            @else
                                                <div id="img{{ $key }}" style="border:1px solid black">
                                                    <img src="{{ asset('brainBalanceFiles/files') }}/{{ $file }}"
                                                        alt="Files" srcset="" class="img-thumbnail"
                                                        width="70px" height="50px">
                                                    <a href="javascript:void(0)" class="text-danger imgRemove"
                                                        data-key="{{ $key }}" data-id="{{ $contents->id }}"
                                                        data-name="{{ $file }}"><i class="fa fa-times"></i></a>
                                                </div>
                                            @endif
                                        @empty
                                            <p>No files found.</p>
                                        @endforelse
                                    @endif
                                </div>
                            </div>
                        </div>
                        <span class="text-danger">
                            @error('uploadfiles')
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

        CKEDITOR.replace('description');
    </script>
    <!-- CK EDITOR SCRIPT  -->

    <script>
        $(document).ready(function() {
            $('.imgRemove').on('click', function() {
                let cmr = confirm('Are you sure delete this image.');
                if (cmr) {
                    let id = $(this).data('id')
                    let imagename = $(this).data('name')
                    let key = $(this).data('key')
                    $.ajax({
                        type: "post",
                        url: "{{ route('admin.contentUpdateTimeDeleteImg') }}",
                        data: {
                            'id': id,
                            'imagename': imagename
                        },
                        success: function(response) {
                            // console.log(response);
                            if (response.msg === 'success') {
                                // console.log(`#img${key}`)
                                $(`#img${key}`).remove();
                            }
                        }
                    });
                }
            })
        });
    </script>
@endpush
