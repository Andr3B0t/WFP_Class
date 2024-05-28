<form method="POST" action="{{route('type.update', $data->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="exampleInputType">Name of Type</label>
        <input type="text" class="form-control" id="exampleInputType" name="type_name"
            aria-describedby="nameHelp" placeholder="Enter Name of Type..." value="{{ $data->name }}">
        <label for="exampleInputType">Description of Type</label>
        <input type="text" class="form-control" id="exampleInputType" name="type_desc"
            aria-describedby="nameHelp" placeholder="Enter description of Type..." value="{{ $data->description }}">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <a class="btn btn-warning" href="{{ route('type.index') }}">Back</a>
</form>
