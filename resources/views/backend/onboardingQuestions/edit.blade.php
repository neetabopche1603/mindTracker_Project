@extends('partials.backend.app')
@section('adminTitle', 'Edit Onboarding Questions')
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
                            <li class="breadcrumb-item active" aria-current="page">Onboarding</li>
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
                    <h4 class="text-blue h4">Edit Onboarding Questions</h4>
                    <p class="mb-30">Add To Form Details</p>
                </div>
                <div class="pull-right">
                    <a href="javascript:void(0);" onclick="window.history.back()"
                        class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="collapse" role="button"><i
                            class="fa fa-backward" aria-hidden="true"></i> Back</a>
                </div>
            </div>
            <form method="post" action="{{route('admin.onboardingQuesUpdate')}}" type="multfor" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$onboardingData->id}}">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Questions : <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <textarea cols="80" id="editor1" value="{{ old('questions') }}" name="questions" value="" rows="10">{!! $onboardingData->questions !!}</textarea>
                        <span class="text-danger">
                            @error('questions')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Options :<span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10 optionBox">
                        <?php $options = json_decode($onboardingData->options,true); ?>
                     @foreach ($options as $key=>$option)
                     @if($key == 0)
                     <div class="row">
                        <div class="col-8">
                            <div id="options">
                                <div class="option">
                                    <input type="text" name="options[]" class="form-control" value="{{$option}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <button type="button" id="add-option" class="btn btn-success btn-sm">Add more</button>
                        </div>
                    </div>
                    @else
                    <div class="row option mt-2">
                        <div class="col-8">
                            <div id="options">
                                <div class="optionInput">
                                    <input type="text" name="options[]" class="form-control" value="{{$option}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <button type="button" class="remove-option btn btn-danger btn-sm">Remove</button>
                        </div>
                    </div>
                    @endif
                     @endforeach
                     <span class="text-danger">
                         @error('options')
                             {{ $message }}
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

        CKEDITOR.replace('questions');
    </script>
    <!-- CK EDITOR SCRIPT  -->



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
                                <button type="button" class="remove-option btn btn-danger btn-sm">Remove</button>
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
