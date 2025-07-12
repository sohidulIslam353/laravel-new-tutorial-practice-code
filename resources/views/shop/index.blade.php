@extends('welcome')
@section('content')

<div class="container mt-4">
<!-- Display success message if available -->
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<h4>Shop List Total : {{ @$shopCount }}</h4><br>

<a href="{{ route('shop.create') }}" class="btn btn-success mb-3">Add New Shop</a> 

<div class="mb-3">

<form action="{{ route('shop.index') }}" method="GET">
  <div class="input-group">
    <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
    <button class="btn btn-primary" type="submit">Search</button>
  </div>
</form>

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
  @forelse($shopLists as $shop)
    <tr>
      <th scope="row">{{ $shop->id }}</th>
      <td>{{ $shop->shop_name }}</td>
      <td>{{ $shop->shop_number }}</td>
      <td>{{ $shop->shop_phone }}</td>
      <td>{{ $shop->shop_email }}</td>
      <td>{{ $shop->tin_number }}</td>
      <td>
        <a href="{{ route('shop.edit',$shop->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('shop.destroy', $shop->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this shop?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
      </form>
      </td>
    </tr>
    @empty 
    <tr>
      <td colspan="7">No Shop Found</td>
    </tr>
  @endforelse
  </tbody>
</table>

{{ $shopLists->links() }}
</div>
@endsection