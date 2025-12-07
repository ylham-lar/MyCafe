@extends('admin.layouts.app')

@section('title', 'Create Customer')

@section('content')
<div class="container-sm py-4">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">

            <h4 class="mb-4 text-dark">
                <a href="{{ route('admin.customers.index') }}" class="text-warning text-decoration-none">
                    Customers
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

            <form action="{{ route('admin.customers.store') }}"
                method="POST"
                class="bg-white p-4 rounded-4 shadow-sm">

                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">First Name *</label>
                    <input type="text"
                        name="first_name"
                        value="{{ old('first_name') }}"
                        placeholder="Enter first name"
                        class="form-control @error('first_name') is-invalid @enderror">
                    @error('first_name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Last Name *</label>
                    <input type="text"
                        name="last_name"
                        value="{{ old('last_name') }}"
                        placeholder="Enter last name"
                        class="form-control @error('last_name') is-invalid @enderror">
                    @error('last_name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Phone Number *</label>
                    <input type="text"
                        name="phone_number"
                        value="{{ old('phone_number') }}"
                        placeholder="Enter phone number"
                        class="form-control @error('phone_number') is-invalid @enderror">
                    @error('phone_number')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center d-flex justify-content-center gap-3">
                    <a href="{{ route('admin.customers.index') }}" class="btn btn-outline-warning px-4 py-2">
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