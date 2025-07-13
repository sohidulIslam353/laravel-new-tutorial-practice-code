@extends('welcome')
@section('content')

<div class="container mt-4">
<h4>New Customer Open</h4>

<a href="{{ route('customer.index') }}" class="btn btn-primary mb-3">Customer List</a> 


   <!-- Display success message if available -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

<div class="mb-3">
    <form action="{{ route('customer.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Customer Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                   value="{{ old('name') }}" 
                   placeholder="Enter customer name" 
                   aria-describedby="emailHelp" 
                   id="exampleInputEmail1" name="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Customer Phone</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                   value="{{ old('phone') }}" 
                   placeholder="Enter customer phone" 
                   id="exampleInputPassword1" name="phone">
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Customer Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                   value="{{ old('email') }}" 
                   placeholder="Enter customer email" 
                   id="exampleInputPassword1" name="email">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
      
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection