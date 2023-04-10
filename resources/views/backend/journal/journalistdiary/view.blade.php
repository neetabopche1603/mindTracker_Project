@extends('partials.backend.app')
@section('adminTitle', 'View Journalist')
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
                            <li class="breadcrumb-item active" aria-current="page">Journal > View Journalist</li>
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
                    <h4 class="text-blue h4">View Journalist</h4>
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
                <input type="hidden" name="id" value="{{$journalistView[0]->id}}">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-dark"><b>User</b> :</label>
                    <div class="col-sm-12 col-md-10">
                      <p>{{ $journalistView[0]->user_name}}</p>
                    </div>
                </div>
              
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-dark"><b>Thoughts</b>  :</label>
                    <div class="col-sm-12 col-md-10">
                        <p>{!! $journalistView[0]->my_journal_text !!}</p>
                       
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-dark"><b>Mood/Emoji Type </b>:</label>
                    <div class="col-sm-12 col-md-10">
                        <p>{!! $journalistView[0]->emoji_type !!}</p>
                       
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-dark"><b>Created at </b>:</label>
                    <div class="col-sm-12 col-md-10">

                        <p>{{ \Carbon\Carbon::parse($journalistView[0]->created_at)->format('d M Y H:i:s') }}</p>
                       
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-dark"><b>Updated at </b>:</label>
                    <div class="col-sm-12 col-md-10">
                          <p>{{ \Carbon\Carbon::parse($journalistView[0]->updated_at)->format('d M Y H:i:s') }}</p>
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
