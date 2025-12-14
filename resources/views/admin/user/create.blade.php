@extends('admin.layouts.app')

@section('title', 'Create User')

@section('content')
<div class="container-sm py-4">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">

            <div class="h4 mb-4 text-dark">
                <a href="{{ route('admin.users.index') }}" class="text-decoration-none text-warning">
                    Users
                </a>
                <span class="text-muted">/ Create</span>
            </div>

            @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm rounded-3 bg-warning text-dark">
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger border-0 shadow-sm rounded-3">
                <ul class="mb-0 ps-3">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('admin.users.store') }}" method="POST" class="bg-white p-4 rounded-4 shadow-sm">
                @csrf

                <div class="mb-4">
                    <label for="name" class="form-label fw-semibold">Full Name *</label>
                    <input type="text"
                        name="name"
                        id="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}"
                        placeholder="Enter full name"
                        required>
                    @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="username" class="form-label fw-semibold">Username *</label>
                    <input type="text"
                        name="username"
                        id="username"
                        class="form-control @error('username') is-invalid @enderror"
                        value="{{ old('username') }}"
                        placeholder="Enter username"
                        required>
                    @error('username')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label fw-semibold">Password *</label>
                    <input type="password"
                        name="password"
                        id="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Enter password"
                        required>
                    @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center d-flex justify-content-center gap-3">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-warning px-4 py-2">
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

<style>
    body {
        background: #fff8e1;
        color: #212529;
    }

    .form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
        border-color: #ffc107;
    }

    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
        color: #212529;
        transition: all 0.3s;
    }

    .btn-warning:hover {
        background-color: #ffb300;
        border-color: #ffb300;
        color: #212529;
        transform: translateY(-2px);
        box-shadow: 0 0 12px rgba(255, 193, 7, 0.4);
    }

    .btn-outline-warning:hover {
        background-color: #ffecb3;
        color: #212529;
        border-color: #ffc107;
    }

    .alert {
        font-size: 0.95rem;
    }

    .h4 a {
        font-weight: 600;
    }
</style>

@endsection