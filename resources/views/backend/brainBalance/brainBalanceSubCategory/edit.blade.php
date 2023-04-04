@extends('partials.backend.app')
@section('adminTitle', 'Edit Sub-Category (BrainBalance)')
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
                            <li class="breadcrumb-item active" aria-current="page">Brain Balance > Sub-Category</li>
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
                    <h4 class="text-blue h4">Edit Sub-Category</h4>
                    <p class="mb-30">Edit To Form Details</p>
                </div>
                <div class="pull-right">
                    <a href="javascript:void(0);" onclick="window.history.back()"
                        class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="collapse" role="button"><i
                            class="fa fa-backward" aria-hidden="true"></i> Back</a>
                </div>
            </div>
            <form method="post" action="{{route('admin.brainSubCateUpdate')}}" type="multfor">
                @csrf
                <input type="hidden" name="id" value="{{$subCategoryEdit->id}}">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Categories : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <select class="form-control" name="category_id" id="">
                            <option value="" selected disabled>Select Category</option>
                            @foreach ($categories as $cate)
                            <option value="{{$cate->id}}" {{$cate->id==$subCategoryEdit->category_id?'selected':''}}  >{{$cate->category_name}}</b></option>
                            @endforeach
                        </select>
                        <span class="text-danger">
                            @error('category_id')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Sub-Category : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <input type="text" class="form-control" name="sub_category_name" value="{{$subCategoryEdit->sub_category_name}}">
                        <span class="text-danger">
                            @error('sub_category_name')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Status : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <div class="custom-control custom-radio mb-5">
                            <input type="radio" id="customRadio1" name="status" value="0" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio1">BLOCK</label>
                        </div>
                        <div class="custom-control custom-radio mb-5">
                            <input type="radio" id="customRadio2" name="status" value="1"  class="custom-control-input" checked>
                            <label class="custom-control-label" for="customRadio2">UNBLOCK</label>
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
