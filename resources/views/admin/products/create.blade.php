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
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Name *</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Name RU</label>
                    <input type="text" name="name_ru" value="{{ old('name_ru') }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Name TM</label>
                    <input type="text" name="name_tm" value="{{ old('name_tm') }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Price *</label>
                    <input type="number" name="price" value="{{ old('price') }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Code *</label>
                    <input type="text" name="code" value="{{ old('code') }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Description</label>
                    <textarea name="description" rows="3" class="form-control">{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Description RU</label>
                    <textarea name="description_ru" rows="3" class="form-control">{{ old('description_ru') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Description TM *</label>
                    <textarea name="description_tm" rows="3" class="form-control">{{ old('description_tm') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Discount %</label>
                    <input type="number" name="discount_percent" value="{{ old('discount_percent', 0) }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Weight (g)</label>
                    <input type="number" step="0.01" name="weight" value="{{ old('weight') }}" class="form-control">
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="text-center d-flex justify-content-center gap-3">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-warning px-4 py-2">
                        <i class="bi bi-arrow-left-circle me-1"></i> Back
                    </a>
                    <button type="submit" class="btn btn-warning px-4 py-2 text-dark">
                        <i class="bi bi-plus-circle me-1"></i> Create
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection