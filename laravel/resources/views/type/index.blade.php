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
                <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height btn-primary"
                    data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                    <i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp;
                    <i class="fa fa-angle-down"></i>
                </div>
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <div class="row">
            @if (@session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <a class="btn btn-warning" href="{{ route('type.create') }}">+ New Type</a>
            <a href="#modalCreate" data-toggle="modal" class="btn btn-info">+ New Type(with Modals)</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Tipe</th>
                        <th>Description</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td>{{ $d->id }}</td>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->description }}</td>
                            <td>{{ $d->created_at }}</td>
                            <td>{{ $d->updated_at }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('type.edit', $d->id) }}">Edit</a>
                                <a href="#modalEditA" class="btn btn-warning" data-toggle="modal"
                                    onclick="getEditForm({{ $d->id }})">Edit Type A</a>

                                <form method="POST" action="{{ route('type.destroy', $d->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="delete" class="btn btn-danger"
                                        onclick="return confirm('Are you sure to delete {{ $d->id }} - {{ $d->name }} ? ');">
                                </form>

                            </td>

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

        <div class="modal fade" id="modalEditA" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog modal-wide">
                <div class="modal-content">
                    <div class="modal-body" id="modalContent">
                        {{-- You can put animated loading image here... --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Add New Type</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('type.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputType">Name of Type</label>
                                <input type="text" class="form-control" id="exampleInputType" name="type_name"
                                    aria-describedby="nameHelp" placeholder="Enter Name of Type...">
                                <small id="nameHelp" class="form-text text-muted">Please write down the name of type
                                    here.</small>
                            </div>

                            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </form>

                        {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('javascript')
        <script>
            function getEditForm(type_id) {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('type.getEditForm') }}',
                    data: {
                        '_token': '<?php echo csrf_token(); ?>',
                        'id': type_id
                    },
                    success: function(data) {
                        $('#modalContent').html(data.msg)
                    }
                });
            }
        </script>
    @endsection
