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
                            <li class="breadcrumb-item active" aria-current="page">Brain Balance >Content</li>
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
            {{-- <form method="post" action="{{route('admin.brainBalContentStore')}}" type="multfor"> --}}
                <form class="dropzone" action="#" id="my-awesome-dropzone">
                @csrf

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Categories : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <select class="form-control" name="subCategory_id" id="">
                            <option value="" selected disabled>Select SubCategory</option>
                            @foreach ($subCategory as $subCate)
                            <option value="{{$subCate->id}}">{{$subCate->sub_category_name}}</b></option>
                            @endforeach
                        </select>
                        <span class="text-danger">
                            @error('subCategory_id')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Title : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <input type="text" class="form-control" name="category_name" value="{{old('category_name')}}">
                        <span class="text-danger">
                            @error('category_name')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Description : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <textarea cols="80" id="editor1" value="{{ old('description') }}" name="description" value="" rows="10"></textarea>
                        <span class="text-danger">
                            @error('description')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Image : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10 fallback">
                        <input type="file" class="form-control" name="category_name" value="{{old('category_name')}}">
                        <span class="text-danger">
                            @error('category_name')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Files : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <input type="file" class="form-control" name="category_name" value="{{old('category_name')}}">
                        <span class="text-danger">
                            @error('category_name')
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

        CKEDITOR.replace('description');
    </script>
    <!-- CK EDITOR SCRIPT  -->
    @endpush
