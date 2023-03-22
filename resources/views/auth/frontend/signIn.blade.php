@extends('partials.frontend.app')
@section('front_title','Sign in !')
@section('content')
<!--page-title-->
<div class="ttm-page-title-row">
    <div class="ttm-page-title-row-inner ttm-bgcolor-darkgrey">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading">
                        <h2 class="title"> Sign in</h2>
                        <h5 class="sub-title"> Smile Pure always places patients at the center of our attention</h5>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <span>
                            <a title="Homepage" href="/">Home</a>
                        </span>
                        <span class="ttm-bread-sep"><i class="fa fa-long-arrow-right"></i></span>
                        <span> Sign in</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--page-title end-->

<div class="container w-50 mt-lg-4 mb-lg-4 ">
    <!-- <div class="card"> -->
    <div class="card-body shadow-lg p-3 mb-5 bg-white rounded">
        <div class="layer-content text-center">
            <div class="mb-40 res-991-mb-0">
                <h4>Fill out for <strong class="ttm-textcolor-skincolor">Sign in</strong></h4>
                <p class="text-center">Fill-in the Login form and get immediate assistance from our medical consultance.</p>
            </div>
            <form action="#" class="contact_form_1 wrap-form clearfix" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <label>
                            <span class="text-input"><input name="email" type="text" value="" placeholder="Your E-mail :" required="required"></span>
                        </label>

                        <label>
                            <span class="text-input"><input name="password" type="password" value="" placeholder="Your password :" required="required"></span>
                        </label>
                    </div>
                </div>
               
                <button class="submit ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor w-100 mt_5" type="submit">sign in !</button>
            </form>
        </div>
    </div>

    <!-- </div> -->
</div>


@endsection