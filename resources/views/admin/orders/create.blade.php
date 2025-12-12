@extends('admin.layouts.app')

@section('title', 'Create Order')

@section('content')
<div class="container-sm py-4">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">

            <h4 class="mb-4 text-dark">
                <a href="{{ route('admin.orders.index') }}" class="text-warning text-decoration-none">
                    Orders
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

            <form action="{{ route('admin.orders.store') }}"
                method="POST"
                class="bg-white p-4 rounded-4 shadow-sm">

                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Customer *</label>
                    <select name="customer_id"
                        class="form-select @error('customer_id') is-invalid @enderror">
                        <option value="">Choose customer</option>
                        @foreach($customers as $c)
                        <option value="{{ $c->id }}" {{ old('customer_id') == $c->id ? 'selected' : '' }}>
                            {{ $c->address }}
                        </option>
                        @endforeach
                    </select>
                    @error('customer_id')
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

                <div class="text-center d-flex justify-content-center gap-3">
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-warning px-4 py-2">
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