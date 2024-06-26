@extends('layouts.conquer2')

@section('content')
<div class="page-content">
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
    List of Hotel
    </h3>
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="index.html">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Index of Hotel</a>
        </li>


    </ul>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Index of Hotel</a>
            </li>
            <li >
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#" onclick="showInfo()">
                <i class="icon-bulb"></a></i>
             </li>
        </ul>
        <div class="page-toolbar">
            <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height btn-primary" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                <i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp; <i class="fa fa-angle-down"></i>
            </div>
        </div>
    </div>
    <!-- END PAGE HEADER-->
    <div id="showinfo"></div>
    <div class="row">
        <table class="table">
          <thead>
            <tr>
              <th>Nama Hotel</th>
              <th>List Produk</th>
              <th>Created At</th>
              <th>Updated At</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($data as $d)
              <tr>
                  <td>{{ $d->name }}</td>
                  <td>
                  @foreach ($d->products as $item)
                  <ul>
                      <li>{{$item->name}}</li>
                  </ul>
                  @endforeach
                  <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#myModal'onclick='showProducts({{ $d->id }})'>Detail</a>
                  </td>
                  <td>{{ $d->created_at }}</td>
                  <td>{{ $d->updated_at }}</td>
              </tr>
              @endforeach
          </tbody>
        </table>
        <div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-wide">
       <div class="modal-content" id="showproducts">
         <!--loading animated gif can put here-->
       </div>
    </div>
  </div>


@endsection

@section('javascript')
<script>
function showProducts(hotel_id)
{
  $.ajax({
    type:'POST',
    url:'{{route("hotel.showProducts")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
          'hotel_id':hotel_id
         },
    success: function(data){
       $('#showproducts').html(data.msg)
    }
  });
}

// function showInfo()
// {
//   $.ajax({
//     type:'POST',
//     url:'{{route("hotels.showInfo")}}',
//     data:'_token=<?php echo csrf_token() ?>',
//     success: function(data){
//        $('#showinfo').html(data.msg)
//     }
//   });
// }
</script>
@endsection

