@extends('partials.backend.app')
@section('adminTitle','Edit Form')
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
                        <li class="breadcrumb-item active" aria-current="page">Edit From</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Default Basic Forms Start -->
    <div class="pd-20 card-box mb-30">
    {{--@include('partials.alert')--}}
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Edit Form</h4>
                <p class="mb-30">Edit To Form Details</p>
            </div>
            <div class="pull-right">
                <a href="javascript:void(0);" onclick="window.history.back()" class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="collapse" role="button"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
            </div>
        </div>
        <form  method="post" action="#" type="multfor" enctype="multipart/form-data">
          @csrf
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Name : <span class="text-danger">*</span></label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="category" value="{{old('category')}}" placeholder="">
                </div>
                <span class="text-danger">
                    @error('category')
                       {{$message}} 
                    @enderror
                </span>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Slug :<span class="text-danger">*</span></label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" value="{{old('slug')}}" name="slug" type="text">
                </div>
                <span class="text-danger">
                    @error('slug')
                       {{$message}} 
                    @enderror
                </span>
            </div>

            

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Image :<span class="text-danger">*</span></label>
                <div class="col-sm-6 col-md-10">
                    <input class="form-control" type="file" name="cat_img">
                    <span class="text-danger">
                    @error('cat_img')
                       {{$message}} 
                    @enderror
                </span>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Password :<span class="text-danger">*</span></label>
                <div class="col-sm-6 col-md-10">
                    <input class="form-control" type="password" name="password">
                    <span class="text-danger">
                    @error('password')
                       {{$message}} 
                    @enderror
                </span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Email :<span class="text-danger">*</span></label>
                <div class="col-sm-6 col-md-10">
                    <input class="form-control" type="email" name="email">
                    <span class="text-danger">
                    @error('email')
                       {{$message}} 
                    @enderror
                </span>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">textarea :</label>
                <div class="col-sm-12 col-md-10">
                <textarea class="form-control" name="banner_description" value="{{old('banner_description')}}"></textarea>
                </div>
                <span class="text-danger">
                    @error('banner_description')
                       {{$message}} 
                    @enderror
                </span>
            </div>



            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Description :<span class="text-danger">*</span></label>
                <div class="col-sm-12 col-md-10">
                  {{--<textarea name="desc_book" value="{{old('desc_book')}}" class="textarea_editor form-control border-radius-0" placeholder="Enter text ..."></textarea>--}}

                   <textarea cols="80" id="editor1" value="{{old('desc_book')}}" name="desc_book" value="" rows="10"></textarea>

                    <span class="text-danger">
                        @error('desc_book')
                        {{$message}}
                        @enderror
                    </span>
                </div>

            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Languages : <span class="text-danger">*</span></label>
                <div class="col-sm-12 col-md-10">
                    <select class="form-control" name="language_id" id="">
                        <option value="" selected disabled>Select Language</option>
                        <option value="">HTML</option>
                        <option value="">CSS</option>
                        <option value="">Javascript</option>
                        <option value="">PHP</option>
                    </select>

                    <span class="text-danger">
                        @error('language_id')
                        {{$message}}
                        @enderror
                    </span>
                </div>
            </div>


            <input type="submit" class="btn btn-primary" value="Save">

        </form>
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

    CKEDITOR.replace('desc_book');
  </script>
<!-- CK EDITOR SCRIPT  -->
@endpush