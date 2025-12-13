@extends('admin.layouts.app')

@section('title', 'User Agents')

@section('content')
<div class="row align-items-center mb-3 py-3">
    <div class="col-auto h3 ps-5 ms-5">User Agents</div>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered align-middle text-center shadow-sm">
        <thead class="table-dark text-light">
            <tr>
                <th style="width:5%;">ID</th>
                <th style="width:45%;">User Agent</th>
                <th style="width:10%;">Device</th>
                <th style="width:10%;">Platform</th>
                <th style="width:10%;">Browser</th>
                <th style="width:10%;">Status</th>
            </tr>
        </thead>

        <tbody class="bg-light text-dark">
            @forelse($objs as $obj)
            <tr class="table-row-hover">
                <td class="text-muted fw-medium">
                    <i class="bi bi-hash me-1"></i>{{ $obj->id }}
                </td>

                <td class="text-break fw-semibold text-center">
                    <i class="bi bi-terminal me-1 text-secondary"></i>
                    {{ $obj->user_agent }}
                </td>

                <td>
                    <i class="bi bi-phone me-1 text-secondary"></i>
                    {{ $obj->device ?? 'Unknown' }}
                </td>

                <td>
                    <i class="bi bi-cpu me-1 text-secondary"></i>
                    {{ $obj->platform ?? 'Unknown' }}
                </td>

                <td>
                    <i class="bi bi-browser-chrome me-1 text-secondary"></i>
                    {{ $obj->browser ?? 'Unknown' }}
                </td>

                <td>
                    <span class="badge px-3 py-2 {{ $obj->disabled ? 'bg-danger text-white' : 'bg-success text-white' }}">
                        <i class="bi {{ $obj->disabled ? 'bi-x-circle' : 'bi-check-circle' }} me-1"></i>
                        {{ $obj->disabled ? 'Disabled' : 'Active' }}
                    </span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center text-muted py-4 fw-bold">
                    <i class="bi bi-exclamation-circle me-1"></i>No user agents found
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection