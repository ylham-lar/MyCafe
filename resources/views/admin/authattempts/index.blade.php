@extends('admin.layouts.app')

@section('title', 'Auth Attempts')

@section('content')
<div class="row align-items-center mb-3 py-3">
    <div class="col-auto h3 ps-5 ms-5">Auth Attempts</div>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered align-middle text-center shadow-sm">
        <thead class="table-dark text-light">
            <tr>
                <th style="width:5%;">ID</th>
                <th style="width:10%;">IP Address</th>
                <th style="width:50%;">User Agent</th>
                <th style="width:10%;">Username</th>
                <th style="width:10%;">Event</th>
                <th style="width:15%;">Created At</th>
            </tr>
        </thead>

        <tbody class="bg-light text-dark">
            @forelse($authAttempts as $auth)
            <tr class="table-row-hover">
                <td>{{ $auth->id }}</td>

                <td class="fw-bold">
                    <i class="bi bi-wifi me-1 text-primary"></i>
                    {{ $auth->ipAddress?->ip_address ?? '—' }}
                </td>

                <td class="text-break">
                    <i class="bi bi-terminal me-1 text-secondary"></i>
                    {{ $auth->userAgent?->user_agent ?? '—' }}
                </td>

                <td>{{ $auth->username }}</td>

                <td>
                    <span class="badge bg-info text-white px-3 py-2">
                        {{ strtoupper($auth->event) }}
                    </span>
                </td>

                <td class="text-nowrap">
                    <i class="bi bi-clock me-1"></i>
                    {{ $auth->created_at->format('H:i:s d.m.Y') }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center text-muted py-4 fw-bold">
                    No auth attempts found
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection