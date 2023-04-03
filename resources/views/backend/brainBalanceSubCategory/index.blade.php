@extends('partials.backend.app')
@section('adminTitle','Sub-Category Table')
@section('container')

<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Table</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Brain Balance Sub-Category</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <a href="{{route('admin.brainSubCateAddForm')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add Sub-Category</a>

                <!-- <div class="dropdown">
                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        January 2018
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Export List</a>
                        <a class="dropdown-item" href="#">Policies</a>
                        <a class="dropdown-item" href="#">View Assets</a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Simple Datatable start -->
    <div class="card-box mb-30">
        @include('partials.alertMessages')
        <div class="pd-20">
            <h4 class="text-blue h4">Table List</h4>
            <h4 class="text-blue h4">Data Table with Checckbox select</h4>
        </div>
        <a href="javascript:void(0)" class="btn btn-danger m-3" id="deleteAll">Delete All</a>
        <div class="pb-20 table-responsive">
            <table class="checkbox-datatable table nowrap empCrudTable">
                <thead>
                    <tr>
                        <th>
                            <div class="dt-checkbox">
                                <input type="checkbox" name="select_all" value="1" id="master">
                                <span class="dt-checkbox-label"></span>
                            </div>
                        </th>
                        <th>#</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tbl_data">
                    <tr>
                        <td class="table-plus">
                            <div class="dt-checkbox">
                                <input type="checkbox" id="example-select-all" class="sub_chk">
                                <span class="dt-checkbox-label"></span>
                            </div>
                        </td>
                        <td>1</td>
                        <td>Neeta</td>
                        <td>16-03-2023</td>
                        <td>neeta</td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="#" class="text-warning"><i class="dw dw-eye text-warning"></i> View</a>

                                    <a class="dropdown-item" href="#"><i class="dw dw-edit2 text-success"></i> Edit</a>

                                    <a class="dropdown-item" href="#" onclick="confirm('Are You sure delete this data')"><i class="dw dw-delete-3 text-danger"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection