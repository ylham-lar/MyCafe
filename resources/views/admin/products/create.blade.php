@extends('admin.layouts.app')

@section('title', 'Create Product')

@section('content')
<div class="container-sm py-4">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">

            <h4 class="mb-4 text-dark">
                <a href="{{ route('admin.products.index') }}" class="text-warning text-decoration-none">
                    Products
                </a>
                <span class="text-muted">/ Create</span>
            </h4>

            @if($errors->any())
            <div class="alert alert-danger rounded-3 shadow-sm">
                <ul class="mb-0 ps-3">
                    @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('admin.products.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="bg-white p-4 rounded-4 shadow-sm">

                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Category</label>
                    <select name="category_id" class="form-select">
                        <option value="">No category</option>
                        @foreach($categories as $c)
                        <option value="{{ $c->id }}" {{ old('category_id') == $c->id ? 'selected' : '' }}>
                            {{ $c->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Name *</label>
                    <input type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Price *</label>
                    <input type="number"
                        name="price"
                        value="{{ old('price') }}"
                        class="form-control @error('price') is-invalid @enderror">
                    @error('price')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Code *</label>
                    <input type="text"
                        name="code"
                        value="{{ old('code') }}"
                        class="form-control @error('code') is-invalid @enderror">
                    @error('code')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Description *</label>
                    <textarea name="description"
                        class="form-control @error('description') is-invalid @enderror"
                        rows="3">{{ old('description') }}</textarea>
                    @error('description')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Discount %</label>
                    <input type="number"
                        name="discount_percent"
                        value="{{ old('discount_percent') }}"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Weight (g)</label>
                    <input type="number"
                        step="0.01"
                        name="weight"
                        value="{{ old('weight') }}"
                        class="form-control">
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Image</label>
                    <input type="file"
                        name="image"
                        class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center d-flex justify-content-center gap-3">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-warning px-4 py-2">
                        <i class="bi bi-arrow-left-circle me-1"></i> Back
                    </a>
                    <button type="submit" class="btn btn-warning px-4 py-2 text-dark">
                        <i class="bi bi-plus-circle me-1"></i> Add
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection