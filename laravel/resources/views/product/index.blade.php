@extends('layouts.conquer2')

@section('content')
<div class="page-content">
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
    List of Products
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Index of Products</a>
            </li>
        </ul>
        <div class="page-toolbar">
            <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height btn-primary" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                <i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp; <i class="fa fa-angle-down"></i>
            </div>
        </div>
    </div>
    <!-- END PAGE HEADER-->
    <a class="btn btn-warning" data-toggle="modal" href="#disclaimer">disclaimer</a>
    <div class="row">
        <table class="table">
          <thead>
            <tr>
              <th>Nama Produk</th>
              <th>Harga Produk</th>
              <th>Hotel ID</th>
              <th>Detail</th>
              <th>Created At</th>
              <th>Updated At</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($data as $d)
              <tr>
                  <td>{{ $d->name }}</td>
                  <td>{{ $d->price }}</td>
                  <td>{{ $d->hotel_id }}</td>
                  <td>
                    <a class="btn btn-info"  href="#detail_{{$d->id}}" data-toggle="modal">{{ $d->name }}</a>

                                    <div class="modal fade" id="detail_{{$d->id}}" tabindex="-1" role="basic" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">{{$d->name}}</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <img src={{ asset($d->images)}} height='200px' />
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                </td>

                  <td>{{ $d->created_at }}</td>
                  <td>{{ $d->updated_at }}</td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>


  <div class="modal fade" id="disclaimer" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">DISCLAIMER</h4>
          </div>
          <div class="modal-body">
            Pictures shown are for illustration purpose only. Actual product may vary due to product enhancement.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
     </div>
</div>
@endsection
