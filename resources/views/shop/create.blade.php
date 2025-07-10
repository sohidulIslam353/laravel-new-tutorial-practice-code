@extends('welcome')
@section('content')

<div class="container mt-4">
<h4>New Shop Open</h4>

<a href="{{ route('shop.index') }}" class="btn btn-primary mb-3">Shop List</a> 


 <!-- Display success message if available -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

<div class="mb-3">
    <form action="{{ route('shop.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Shop Name</label>
            <input type="text" class="form-control @error('shop_name') is-invalid @enderror" 
                   value="{{ old('shop_name') }}" 
                   placeholder="Enter shop name" 
                   aria-describedby="emailHelp" 
                   id="exampleInputEmail1" name="shop_name">
            @error('shop_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Shop Number</label>
            <input type="text" class="form-control @error('shop_number') is-invalid @enderror" 
                   value="{{ old('shop_number') }}" 
                   placeholder="Enter shop number" 
                   id="exampleInputPassword1" name="shop_number">
            @error('shop_number')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Shop Phone</label>
            <input type="text" class="form-control @error('shop_phone') is-invalid @enderror" 
                   value="{{ old('shop_phone') }}" 
                   placeholder="Enter shop phone" 
                   id="exampleInputPassword1" name="shop_phone">
            @error('shop_phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Shop Address</label>
            <input type="text" class="form-control @error('shop_address') is-invalid @enderror" 
                   value="{{ old('shop_address') }}" 
                   placeholder="Enter shop address" 
                   id="exampleInputPassword1" name="shop_address">
            @error('shop_address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Shop Email</label>
            <input type="email" class="form-control @error('shop_email') is-invalid @enderror" 
                   value="{{ old('shop_email') }}" 
                   placeholder="Enter shop email" 
                   id="exampleInputPassword1" name="shop_email">
            @error('shop_email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Tin Number</label>
            <input type="text" class="form-control @error('tin_number') is-invalid @enderror" 
                   value="{{ old('tin_number') }}" 
                   placeholder="Enter tin number" 
                   id="exampleInputPassword1" name="tin_number">
            @error('tin_number')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection