<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Product Detail</h2>
  <p>Detail of product with name : {{ $data->name }}</p>
  <table class="table">
    <thead>
      <tr>
        <th>Nama Produk</th>
        <th>Harga Produk</th>
        <th>Hotel ID</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Hotel Name</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $data->name }}</td>
            <td>{{ $data->price }}</td>
            <td>{{ $data->hotel_id }}</td>
            <td>{{ $data->created_at }}</td>
            <td>{{ $data->updated_at }}</td>
            <td>{{ $data->hotel->name}}</td>
        </tr>
    </tbody>
  </table>
</div>

</body>
</html>
