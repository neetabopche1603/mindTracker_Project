@extends('partials.backend.app')
@section('adminTitle', 'View Onboarding Questions')
@section('container')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Details Form</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Onboarding</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Default Basic Forms Start -->
        <div class="pd-20 card-box mb-30">
            @include('partials.alertMessages')
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Details Onboarding Questions & Options</h4>
                    <p class="mb-30">Details Form</p>
                </div>
                <div class="pull-right">
                    <a href="javascript:void(0);" onclick="window.history.back()"
                        class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="collapse" role="button"><i
                            class="fa fa-backward" aria-hidden="true"></i> Back</a>
                </div>
            </div>
            <form method="post" action="#" type="multfor"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $onboardingViewData->id }}">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Questions : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <textarea cols="80" id="editor1" name="questions" value="" rows="10" disabled>{!! $onboardingViewData->questions !!}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Options :<span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10 optionBox">
                        <?php $options = json_decode($onboardingViewData->options, true); ?>
                        @foreach ($options as $key => $option)
                            @if ($key == 0)
                                <div class="row">
                                    <div class="col-8">
                                        <div id="options">
                                            <div class="option">
                                                <input type="text" name="options[]" class="form-control"
                                                    value="{{ $option }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-2">
                                        <button type="button" id="add-option" class="btn btn-success">Add more</button>
                                    </div> --}}
                                </div>
                            @else
                                <div class="row option mt-2">
                                    <div class="col-8">
                                        <div id="options">
                                            <div class="optionInput">
                                                <input type="text" name="options[]" class="form-control"
                                                    value="{{ $option }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-2">
                                        <button type="button" class="remove-option btn btn-danger">Remove</button>
                                    </div> --}}
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                {{-- @if ($onboardingViewData->status==1)
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Status : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <div class="custom-control custom-radio mb-5">
                           <span class="badge badge-success">Active</span>
                        </div>
                    </div>
                </div>
                @else
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Status : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <div class="custom-control custom-radio mb-5">
                            <span class="badge badge-danger">Block</span>
                        </div>
                    </div>
                </div>
                @endif --}}
                {{-- <input type="submit" class="btn btn-primary" value="Save"> --}}
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

        CKEDITOR.replace('questions');
    </script>
    <!-- CK EDITOR SCRIPT  -->

{{-- Multiple Option Select Script --}}
    <script>
        $(document).ready(function() {
            $('#add-option').click(function(e) {
                e.preventDefault();
                //     $('#options').append('<div class="option optionDiv"><input type="text" name="options[]" class="form-control"><button class="remove-option btn btn-danger">Remove</button></div>');
                //   });
                $('.optionBox').append(`<div class="row option mt-2">
                            <div class="col-8">
                                <div id="options">
                                    <div class="optionInput">
                                        <input type="text" name="options[]" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <button type="button" class="remove-option btn btn-danger">Remove</button>
                            </div>
                        </div>
             `);
            });
            $(document).on('click', '.remove-option', function() {
                $(this).closest('.option').remove();
            });
        });
    </script>
@endpush
