@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="mb-0">Product Inventory Manager</h1>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('products.create') }}" class="btn btn-primary">+ Add New Product</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Search Section -->
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('products.search') }}" method="GET" class="row g-3">
                <div class="col-md-8">
                    <input 
                        type="text" 
                        name="q" 
                        class="form-control" 
                        placeholder="Search by product name or category..."
                        value="{{ isset($searchTerm) ? $searchTerm : '' }}"
                    >
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-outline-primary w-100">Search</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="btn-group" role="group">
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">All</a>
                <a href="{{ route('products.filter', 'in-stock') }}" class="btn btn-outline-success">In Stock</a>
                <a href="{{ route('products.filter', 'low-stock') }}" class="btn btn-outline-warning">Low Stock</a>
                <a href="{{ route('products.filter', 'out-of-stock') }}" class="btn btn-outline-danger">Out of Stock</a>
            </div>
        </div>
    </div>

    <!-- Products Table -->
    @if($products->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>#{{ $product->id }}</td>
                            <td>
                                <strong>{{ $product->name }}</strong>
                                @if($product->description)
                                    <br><small class="text-muted">{{ Str::limit($product->description, 50) }}</small>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-info">{{ $product->category ?? 'N/A' }}</span>
                            </td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>
                                <span class="badge bg-secondary">{{ $product->quantity }} units</span>
                            </td>
                            <td>
                                @if($product->isOutOfStock())
                                    <span class="badge bg-danger">❌ Out of Stock</span>
                                @elseif($product->isLowStock())
                                    <span class="badge bg-warning">⚠️ Low Stock</span>
                                @else
                                    <span class="badge bg-success">✓ In Stock</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info text-center py-5">
            <h4>No Products Found</h4>
            <p class="mb-3">Your inventory is empty. Start by adding your first product!</p>
            <a href="{{ route('products.create') }}" class="btn btn-primary">Add First Product</a>
        </div>
    @endif
</div>
@endsection
