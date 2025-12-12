@extends('admin.layouts.app')

@section('title', 'Products')

@section('content')
<div class="row align-items-center mb-3">
    <div class="col-auto h3 ps-5 ms-5">Products</div>
    <div class="col text-end p-3 me-5">
        <a href="{{ route('admin.products.create') }}" class="btn btn-warning">
            <i class="bi bi-plus-lg"></i>
        </a>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered align-middle text-center shadow-sm">
        <thead class="table-dark text-light">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Name RU</th>
                <th>Name TM</th>
                <th>Code</th>
                <th>Price</th>
                <th>Discount %</th>
                <th>Price After Discount</th>
                <th>Weight</th>
                <th>Category</th>
                <th>Settings</th>
            </tr>
        </thead>

        <tbody class="bg-light text-dark">
            @forelse($objs as $obj)
            <tr class="table-row-hover">

                <td>{{ $obj->id }}</td>

                <td>
                    @if($obj->image)
                    <img src="{{ asset('storage/' . $obj->image) }}" width="60" class="rounded">
                    @else
                    <span class="text-muted">No image</span>
                    @endif
                </td>

                <td>{{ $obj->name }}</td>
                <td>{{ $obj->name_ru ?? '-' }}</td>
                <td>{{ $obj->name_tm ?? '-'}}</td>

                <td>{{ $obj->code }}</td>

                <td>{{ number_format($obj->price) }} $</td>

                <td>{{ $obj->discount_percent }}%</td>

                <td class="fw-bold text-success">
                    {{ number_format($obj->price - ($obj->price * $obj->discount_percent / 100), 2) }} $
                </td>

                <td>{{ $obj->weight }} g</td>

                <td>{{ $obj->category->name ?? '-' }}</td>

                <td>
                    <a href="{{ route('admin.products.edit', $obj->id) }}"
                        class="btn btn-sm btn-outline-dark btn-warning">
                        <i class="bi bi-pencil"></i>
                    </a>

                    <button type="button" class="btn btn-dark btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#deleteModal-{{ $obj->id }}">
                        <i class="bi bi-trash-fill"></i>
                    </button>

                    <div class="modal fade" id="deleteModal-{{ $obj->id }}" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 shadow-lg rounded-4 bg-dark text-light">

                                <div class="modal-header border-0 p-3"
                                    style="background: linear-gradient(90deg, #dc3545, #b02a37);">
                                    <h5 class="modal-title fw-bold">Confirm Deletion</h5>
                                    <button type="button" class="btn-close btn-close-white"
                                        data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body p-4 text-center">
                                    <i class="bi bi-exclamation-triangle-fill text-warning fs-1 mb-3"></i>
                                    <p class="mb-0 fs-6 fw-bold text-dark">
                                        Delete product <strong>{{ $obj->name }}</strong>?
                                    </p>
                                </div>

                                <div class="modal-footer justify-content-center border-0 mb-3">
                                    <form method="POST"
                                        action="{{ route('admin.products.destroy', $obj->id) }}"
                                        class="d-flex gap-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            class="btn btn-outline-secondary px-4 fw-bold"
                                            data-bs-dismiss="modal">
                                            Cancel
                                        </button>
                                        <button type="submit"
                                            class="btn btn-danger px-4 fw-bold">
                                            <i class="bi bi-trash-fill me-1"></i> Delete
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                </td>
            </tr>

            @empty
            <tr>
                <td colspan="12" class="text-center text-muted py-4 fw-bold">
                    No products found
                </td>
            </tr>
            @endforelse

        </tbody>
    </table>
</div>

@endsection