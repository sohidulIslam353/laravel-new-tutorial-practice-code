@extends('welcome')
@section('content')

<div class="container mt-4">
<!-- Display success message if available -->
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<h4>Customer List Total : {{ @$customerCount }}</h4><br>

<a href="{{ route('customer.create') }}" class="btn btn-success mb-3">Add New Customer</a> 

<div class="mb-3">

<form action="{{ route('customer.index') }}" method="GET">
  <div class="input-group">
    <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
    <button class="btn btn-primary" type="submit">Search</button>
  </div>
</form>

  <table class="table">
  <thead>
    <tr>
      <th scope="col">#Sl</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Register Time</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @forelse($customers as $customer)
    <tr>
      <th scope="row">{{ $customer->id }}</th>
      <td>{{ $customer->name }}</td>
      <td>{{ $customer->phone }}</td>
      <td>{{ $customer->email }}</td>
      <td>{{ date('d F ,Y', strtotime($customer->created_at)) }}</td>
      <td>
        <a href="{{ route('customer.edit',$customer->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('customer.destroy', $customer->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this shop?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
      </form> 
      </td>
    </tr>
    @empty 
    <tr>
      <td colspan="7">No Customer Found</td>
    </tr>
  @endforelse
  </tbody>
</table>

{{ $customers->links() }}
</div>
@endsection