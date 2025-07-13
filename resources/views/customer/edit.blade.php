@extends('welcome')
@section('content')

<div class="container mt-4">
<h4>Update Customer Data</h4>

<a href="{{ route('customer.index') }}" class="btn btn-primary mb-3">Go Back</a> 


   <!-- Display success message if available -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

<div class="mb-3">
    <form action="{{ route('customer.update',$customer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Customer Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                   value="{{ old('name',$customer->name) }}" 
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
                   value="{{ old('phone',$customer->phone) }}" 
                   placeholder="Enter customer phone" 
                   id="exampleInputPassword1" name="phone">
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Customer Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                   value="{{ old('email',$customer->email) }}" 
                   placeholder="Enter customer email" 
                   id="exampleInputPassword1" name="email">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
      
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection