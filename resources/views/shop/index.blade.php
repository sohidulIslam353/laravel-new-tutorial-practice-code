@extends('welcome')
@section('content')

<div class="container mt-4">
<h4>Shop List</h4>

<a href="#" class="btn btn-success mb-3">Add New Shop</a> 

<div class="mb-3">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#Sl</th>
      <th scope="col">Shop Name</th>
      <th scope="col">Shop Number</th>
      <th scope="col">Shop Phone</th>
      <th scope="col">Shop Email</th>
      <th scope="col">Tin Number</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($shopLists as $shop)
    <tr>
      <th scope="row">{{ $shop->id }}</th>
      <td>{{ $shop->shop_name }}</td>
      <td>{{ $shop->shop_number }}</td>
      <td>{{ $shop->shop_phone }}</td>
      <td>{{ $shop->shop_email }}</td>
      <td>{{ $shop->tin_number }}</td>
      <td>
        <a href="#" class="btn btn-primary">Edit</a>
        <a href="#" class="btn btn-danger">Delete</a>
    </tr>
  @endforeach
  </tbody>
</table>
</div>
@endsection