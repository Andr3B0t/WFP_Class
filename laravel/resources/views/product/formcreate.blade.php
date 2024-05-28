@extends('layouts.conquer2')

@section('content')
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            Create of Types
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.html">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Create of Types</a>
                </li>
            </ul>
            <div class="page-toolbar">
                <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height btn-primary"
                    data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                    <i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp;
                    <i class="fa fa-angle-down"></i>
                </div>
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <div class="row">
            <form method="POST" action="{{ route('product.store') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputType">Name of Product</label>
                    <input type="text" class="form-control" id="exampleInputType" name="product_name"
                        aria-describedby="nameHelp" placeholder="Enter Name of product...">
                    <label for="exampleInputType">Price of Product</label>
                    <input type="text" class="form-control" id="exampleInputType" name="product_price"
                        aria-describedby="nameHelp" placeholder="Enter Price of Product...">
                    <label for="exampleInputType">Hotel ID of Product</label>
                    <input type="text" class="form-control" id="exampleInputType" name="product_hotel"
                        aria-describedby="nameHelp" placeholder="Enter hotel id of Product...">
                    <label for="exampleInputType">Available Room of Product</label>
                    <input type="text" class="form-control" id="exampleInputType" name="product_room"
                        aria-describedby="nameHelp" placeholder="Enter Available Room of Product...">
                    <label for="exampleInputType">Image of Product</label>
                    <input type="text" class="form-control" id="exampleInputType" name="product_images"
                        aria-describedby="nameHelp" placeholder="Enter Image of Product...">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-warning" href="{{ route('product.index') }}">Back</a>
            </form>


        </div>
    @endsection
