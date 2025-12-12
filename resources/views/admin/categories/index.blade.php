@extends('admin.layouts.app')

@section('title', 'Categories')

@section('content')

<div class="row align-items-center mb-3">
    <div class="col-auto h3 ps-5 ms-5">Categories</div>
    <div class="col text-end p-3 me-5">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-warning">
            <i class="bi bi-plus-lg"></i>
        </a>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered align-middle text-center shadow-sm">
        <thead class="table-dark text-light">
            <tr>
                <th style="width:5%;">ID</th>
                <th style="width:25%;">Name (EN)</th>
                <th style="width:25%;">Name (RU)</th>
                <th style="width:25%;">Name (TM)</th>
                <th style="width:20%;">Settings</th>
            </tr>
        </thead>

        <tbody class="bg-light text-dark">
            @forelse($objs as $obj)
            <tr class="table-row-hover">
                <td>{{ $obj->id }}</td>
                <td>{{ $obj->name }}</td>
                <td>{{ $obj->name_ru ?? '-' }}</td>
                <td>{{ $obj->name_tm ?? '-' }}</td>

                <td>
                    <!-- Edit -->
                    <a href="{{ route('admin.categories.edit', $obj->id) }}"
                        class="btn btn-sm btn-outline-dark btn-warning">
                        <i class="bi bi-pencil"></i>
                    </a>

                    <button type="button" class="btn btn-dark btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#deleteModal-{{ $obj->id }}">
                        <i class="bi bi-trash-fill"></i>
                    </button>

                    <div class="modal fade" id="deleteModal-{{ $obj->id }}">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 shadow-lg rounded-4 bg-dark text-light">

                                <div class="modal-header border-0 rounded-top p-3"
                                    style="background: linear-gradient(90deg, #dc3545, #b02a37);">
                                    <h5 class="modal-title fw-bold">Confirm Deletion</h5>
                                    <button type="button" class="btn-close btn-close-white"
                                        data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body p-4 text-center">
                                    <i class="bi bi-exclamation-triangle-fill text-warning fs-1 mb-3"></i>
                                    <p class="fw-bold text-light">
                                        Are you sure you want to delete
                                        <strong>{{ $obj->name }}</strong>?
                                    </p>
                                </div>

                                <div class="modal-footer justify-content-center border-0 mb-3">
                                    <form method="POST"
                                        action="{{ route('admin.categories.destroy', $obj->id) }}"
                                        class="d-flex gap-2">
                                        @csrf
                                        @method('DELETE')

                                        <button type="button"
                                            class="btn btn-outline-secondary px-4"
                                            data-bs-dismiss="modal">
                                            Cancel
                                        </button>

                                        <button type="submit" class="btn btn-danger px-4">
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
                <td colspan="5" class="text-center text-muted py-4 fw-bold">
                    No categories found
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<style>
    body {
        background: #f8f9fa;
        color: #212529;
    }

    .table {
        border-radius: .35rem;
        overflow: hidden;
    }

    .table td,
    .table th {
        border-color: #dee2e6;
        vertical-align: middle;
    }

    .table-row-hover:hover {
        background-color: #ffeeba;
        transition: .2s;
    }

    .table-responsive {
        max-height: 70vh;
        overflow-y: auto;
    }

    .table-responsive::-webkit-scrollbar {
        width: 6px;
    }

    .table-responsive::-webkit-scrollbar-thumb {
        background: #adb5bd;
        border-radius: 3px;
    }

    .table-responsive::-webkit-scrollbar-track {
        background: #e9ecef;
    }

    .modal-content:hover {
        transform: translateY(-2px);
        box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, .35);
        transition: .3s;
    }

    .btn-danger:hover {
        background: #b02a37;
        border-color: #b02a37;
    }
</style>

@endsection