@extends('admin.layouts.app')

@section('title', 'Products in ' . $category->name)

@section('content')
<div class="row align-items-center mb-3">
    <div class="col-auto h3 ps-5 ms-5">Products in "{{ $category->name }}"</div>
    <div class="col text-end p-3 me-5">
        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left-circle"></i> Back to Categories
        </a>
    </div>
</div>
<div class=" pb-4">
    @if($products->count() > 0)
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center shadow-sm">
            <thead class="table-dark text-light">
                <tr>
                    <th style="width:5%;">ID</th>
                    <th style="width:55%;">Name</th>
                    <th style="width:20%;">Price</th>
                    <th style="width:20%;">Created At</th>
                </tr>
            </thead>
            <tbody class="bg-light text-dark">
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->created_at->format('H:i:s d.m.Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p class="text-muted text-center fw-bold mt-4">No products found in this category.</p>
    @endif
</div>

<style>
    .table-hover tbody tr:hover {
        background-color: #ffeeba;
        transition: 0.2s;
    }

    .table {
        border-radius: 0.35rem;
        overflow: hidden;
    }

    .table td,
    .table th {
        vertical-align: middle;
    }
</style>
@endsection