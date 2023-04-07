@extends('partials.backend.app')
@section('adminTitle', 'Edit Reviews & Rating')
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
                            <li class="breadcrumb-item active" aria-current="page">Reviews & Rating</li>
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
                    <h4 class="text-blue h4">Edit Reviews</h4>
                    <p class="mb-30">Edit To Form Details</p>
                </div>
                <div class="pull-right">
                    <a href="javascript:void(0);" onclick="window.history.back()"
                        class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="collapse" role="button"><i
                            class="fa fa-backward" aria-hidden="true"></i> Back</a>
                </div>
            </div>
            <form method="post" action="{{ route('admin.reviewsUpdate') }}" type="multfor">
                @csrf
                <input type="hidden" name="id" value="{{ $reviewsEdit->id }}">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Therapist : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <select class="form-control" name="therapist_id" id="">
                            <option value="" selected disabled>Select Therapist</option>
                            @foreach ($therapist as $therapistData)
                                <option value="{{ $therapistData->id }}"
                                    {{ $therapistData->id == $reviewsEdit->therapist_id ? 'selected' : '' }}>
                                    {{ $therapistData->name }}</b></option>
                            @endforeach
                        </select>
                        <span class="text-danger">
                            @error('therapist_id')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">User : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <select class="form-control" name="user_id" id="">
                            <option value="" selected disabled>Select User</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    {{ $user->id == $reviewsEdit->user_id ? 'selected' : '' }}>
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
                    <label class="col-sm-12 col-md-2 col-form-label">Rating :</label>
                    <div class="col-sm-12 col-md-10">
                        <input type="text" class="form-control" name="rating" value="{{ $reviewsEdit->rating }}">
                        <span class="text-danger">
                            @error('rating')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Review(Comment) : <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <textarea cols="80" id="editor1" name="review" value="" rows="10">{{ $reviewsEdit->review }}</textarea>
                        <span class="text-danger">
                            @error('review')
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

        CKEDITOR.replace('review');
    </script>
    <!-- CK EDITOR SCRIPT  -->
@endpush
