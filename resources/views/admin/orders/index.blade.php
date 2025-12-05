@extends('admin.layouts.app')

@section('title', 'Orders')

@section('content')
<div class="row align-items-center mb-3">
    <div class="col-auto h3 ps-5 ms-5">Orders</div>
    <div class="col text-end p-3 me-5">
        <a href="{{ route('admin.orders.create') }}" class="btn btn-warning">
            <i class="bi bi-plus-lg"></i>
        </a>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered align-middle text-center shadow-sm">
        <thead class="table-dark text-light">
            <tr>
                <th style="width:5%;">ID</th>
                <th style="width:25%;">Customer</th>
                <th style="width:20%;">Price</th>
                <th style="width:20%;">Status</th>
                <th style="width:20%;">Created At</th>
                <th style="width:10%;">Settings</th>
            </tr>
        </thead>

        <tbody class="bg-light text-dark">
            @forelse($objs as $obj)
            <tr class="table-row-hover">
                <td>{{ $obj->id }}</td>

                <td>{{ $obj->customer->first_name }} {{ $obj->customer->last_name }}</td>

                <td>{{ number_format($obj->price) }} TMT</td>

                <td>
                    @if($obj->status == 'pending')
                    <span class="badge bg-warning text-dark px-3 py-2 rounded-3">Pending</span>
                    @elseif($obj->status == 'paid')
                    <span class="badge bg-success px-3 py-2 rounded-3">Paid</span>
                    @else
                    <span class="badge bg-secondary px-3 py-2 rounded-3">Canceled</span>
                    @endif
                </td>

                <td>{{ $obj->created_at->format('H:i:s d.m.Y') }}</td>

                <td>
                    <a href="{{ route('admin.orders.edit', $obj->id) }}"
                        class="btn btn-sm btn-outline-dark btn-warning">
                        <i class="bi bi-pencil"></i>
                    </a>

                    <button type="button" class="btn btn-dark btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#deleteModal-{{ $obj->id }}">
                        <i class="bi bi-trash-fill"></i>
                    </button>

                    <div class="modal fade" id="deleteModal-{{ $obj->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 shadow-lg rounded-4 bg-dark text-light">

                                <div class="modal-header border-0 p-3"
                                    style="background: linear-gradient(90deg, #dc3545, #b02a37);">
                                    <h5 class="modal-title fw-bold">Confirm Deletion</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body p-4 text-center">
                                    <i class="bi bi-exclamation-triangle-fill text-warning fs-1 mb-3"></i>
                                    <p class="mb-0 fs-6 fw-bold text-dark">
                                        Delete order <strong>#{{ $obj->id }}</strong>?
                                    </p>
                                </div>

                                <div class="modal-footer justify-content-center border-0 mb-3">
                                    <form method="POST" action="{{ route('admin.orders.index', $obj->id) }}" class="d-flex gap-2">
                                        @csrf
                                        @method('DELETE')

                                        <button type="button" class="btn btn-outline-secondary px-4 fw-bold" data-bs-dismiss="modal">
                                            Cancel
                                        </button>

                                        <button type="submit" class="btn btn-danger px-4 fw-bold">
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
                <td colspan="6" class="text-center text-muted py-4 fw-bold">
                    No orders found
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<style>
    body {
        background-color: #f8f9fa;
        color: #212529;
    }

    .table {
        border-radius: 0.35rem;
        overflow: hidden;
    }

    .table th,
    .table td {
        border-color: #dee2e6;
        vertical-align: middle;
    }

    .table-row-hover:hover {
        background-color: #ffeeba;
        transition: background-color 0.2s;
    }

    .table-responsive {
        max-height: 70vh;
        overflow-y: auto;
    }

    .table-responsive::-webkit-scrollbar {
        width: 6px;
    }

    .table-responsive::-webkit-scrollbar-thumb {
        background-color: #adb5bd;
        border-radius: 3px;
    }

    .table-responsive::-webkit-scrollbar-track {
        background: #e9ecef;
    }

    .btn-outline-secondary:hover {
        background-color: #6c757d;
        color: #fff;
        border-color: #6c757d;
    }

    .btn-danger:hover {
        background-color: #b02a37;
        border-color: #b02a37;
        color: #fff;
    }
</style>
@endsection