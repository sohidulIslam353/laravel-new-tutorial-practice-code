@extends('welcome')
@section('content')

<div class="container mt-4">
<!-- Display success message if available -->
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<h4>Shop List</h4>

<a href="{{ route('shop.create') }}" class="btn btn-success mb-3">Add New Shop</a> 

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
        <a href="{{ route('shop.edit',$shop->id) }}" class="btn btn-primary">Edit</a>
        {{-- <a href="{{ route('shop.destroy',$shop->id) }}"  class="btn btn-danger">Delete</a> --}}
        <form action="{{ route('shop.destroy', $shop->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this shop?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
      </form>
      </td>

    </tr>
  @endforeach
  </tbody>
</table>
</div>
@endsection