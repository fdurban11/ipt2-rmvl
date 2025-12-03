@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-8 offset-md-2">
            <a href="{{ route('products.index') }}" class="btn btn-secondary mb-3">← Back to Products</a>
            <h1>{{ $product->name }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5 class="text-muted">Product Details</h5>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <p>{{ $product->name }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Category</label>
                                <p>
                                    @if($product->category)
                                        <span class="badge bg-info">{{ $product->category }}</span>
                                    @else
                                        <span class="text-muted">Not specified</span>
                                    @endif
                                </p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Price</label>
                                <p class="h5">${{ number_format($product->price, 2) }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <h5 class="text-muted">Inventory Details</h5>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Quantity</label>
                                <p class="h5">{{ $product->quantity }} units</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Status</label>
                                <p>
                                    @if($product->isOutOfStock())
                                        <span class="badge bg-danger">❌ Out of Stock</span>
                                    @elseif($product->isLowStock())
                                        <span class="badge bg-warning">⚠️ Low Stock</span>
                                    @else
                                        <span class="badge bg-success">✓ In Stock</span>
                                    @endif
                                </p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Created</label>
                                <p>{{ $product->created_at->format('M d, Y H:i') }}</p>
                            </div>
                        </div>
                    </div>

                    @if($product->description)
                        <div class="mb-4">
                            <label class="form-label fw-bold">Description</label>
                            <p>{{ $product->description }}</p>
                        </div>
                    @endif

                    <hr>

                    <div class="d-flex gap-2">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit Product</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete Product</button>
                        </form>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
