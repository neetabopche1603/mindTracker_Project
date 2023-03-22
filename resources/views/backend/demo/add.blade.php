@extends('partials.backend.app')
@section('adminTitle','Add Form')
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
                        <li class="breadcrumb-item active" aria-current="page">Add Category</li>
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
                <h4 class="text-blue h4">Add Form</h4>
                <p class="mb-30">Add To Form Details</p>
            </div>
            <div class="pull-right">
                <a href="javascript:void(0);" onclick="window.history.back()" class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="collapse" role="button"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
            </div>
        </div>
        <form  method="post" action="#" type="multfor" enctype="multipart/form-data">
          @csrf
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Add From : <span class="text-danger">*</span></label>
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
            <input type="submit" class="btn btn-primary" value="Save">

        </form>
        </code></pre>
    </div>
</div>
</div>
<!-- Default Basic Forms End -->

</div>

@endsection