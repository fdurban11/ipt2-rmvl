@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-8 offset-md-2">
            <h1>{{ isset($product) ? 'Edit Product' : 'Add New Product' }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="POST">
                        @csrf
                        @if(isset($product))
                            @method('PUT')
                        @endif

                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name *</label>
                            <input 
                                type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                id="name" 
                                name="name"
                                value="{{ isset($product) ? $product->name : old('name') }}"
                                required
                            >
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <input 
                                type="text" 
                                class="form-control @error('category') is-invalid @enderror" 
                                id="category" 
                                name="category"
                                value="{{ isset($product) ? $product->category : old('category') }}"
                                placeholder="e.g., Electronics, Clothing, Food"
                            >
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="price" class="form-label">Price ($) *</label>
                                <input 
                                    type="number" 
                                    class="form-control @error('price') is-invalid @enderror" 
                                    id="price" 
                                    name="price"
                                    step="0.01"
                                    min="0"
                                    value="{{ isset($product) ? $product->price : old('price') }}"
                                    required
                                >
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="quantity" class="form-label">Quantity *</label>
                                <input 
                                    type="number" 
                                    class="form-control @error('quantity') is-invalid @enderror" 
                                    id="quantity" 
                                    name="quantity"
                                    min="0"
                                    value="{{ isset($product) ? $product->quantity : old('quantity') }}"
                                    required
                                >
                                @error('quantity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea 
                                class="form-control @error('description') is-invalid @enderror" 
                                id="description" 
                                name="description"
                                rows="4"
                                placeholder="Enter product description..."
                            >{{ isset($product) ? $product->description : old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                {{ isset($product) ? 'Update Product' : 'Add Product' }}
                            </button>
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
