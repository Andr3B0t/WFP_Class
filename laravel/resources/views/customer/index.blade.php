@extends('layouts.conquer2')

@section('content')
<div class="page-content">
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
    List of Types
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Index of Types</a>
            </li>
        </ul>
        <div class="page-toolbar">
            <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height btn-primary" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                <i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp; <i class="fa fa-angle-down"></i>
            </div>
        </div>
    </div>
    <!-- END PAGE HEADER-->
    <div class="row">
        @if(@session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <a class="btn btn-warning" href="{{route('customer.create')}}">+ New customer</a>
        <table class="table" >
            <thead>
            <tr>
              <th>ID</th>
              <th>Nama</th>
              <th>Address</th>
              <th>Created at</th>
              <th>Updated at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $d)
            <tr>
              <td>{{ $d->id }}</td>
              <td>{{ $d->name }}</td>
              <td>{{ $d->address }}</td>
              <td>{{ $d->created_at }}</td>
              <td>{{ $d->updated_at }}</td>

            </tr>
            @endforeach
      </table>
      </div>


      <div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-wide">
           <div class="modal-content" id="msg">
             <!--loading animated gif can put here-->
           </div>
        </div>
    </div>
@endsection
