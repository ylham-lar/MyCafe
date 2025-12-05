@extends('admin.layouts.app')

@section('title', 'Favorites')

@section('content')
<div class="row align-items-center mb-3">
    <div class="col-auto h3 ps-5 ms-5">Favorites</div>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered align-middle text-center shadow-sm">
        <thead class="table-dark text-light">
            <tr>
                <th style="width:5%;">ID</th>
                <th style="width:25%;">Customer</th>
                <th style="width:25%;">Category</th>
                <th style="width:25%;">Product</th>
                <th style="width:20%;">Settings</th>
            </tr>
        </thead>

        <tbody class="bg-light text-dark">
            @forelse($objs as $obj)
            <tr class="table-row-hover">
                <td>{{ $obj->id }}</td>
                <td>{{ $obj->customer->first_name }} {{ $obj->customer->last_name }}</td>
                <td>{{ $obj->product->category->name ?? '-' }}</td>
                <td>{{ $obj->product->name ?? '-' }}</td>
                <td>
                    <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $obj->id }}">
                        <i class="bi bi-trash-fill"></i>
                    </button>

                    <div class="modal fade" id="deleteModal-{{ $obj->id }}">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 shadow-lg rounded-4 bg-dark text-light">
                                <div class="modal-header border-0 rounded-top p-3" style="background: linear-gradient(90deg, #dc3545, #b02a37);">
                                    <h5 class="modal-title fw-bold">Confirm Deletion</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body p-4 text-center">
                                    Delete favorite #{{ $obj->id }}?
                                </div>

                                <div class="modal-footer justify-content-center border-0 mb-3">
                                    <form method="POST" action="{{ route('admin.favorites.destroy', $obj->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger px-4">Delete</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center text-muted py-4 fw-bold">No favorites found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection