@extends('admin.layouts.app')

@section('title', 'Ip Addresses')

@section('content')


<div class="row align-items-center mb-3 py-3    ">
    <div class="col-auto h3 ps-5 ms-5">Ip Addresses</div>
</div>
<div class="table-responsive">
    <table class="table table-hover table-bordered align-middle text-center shadow-sm">
        <thead class="table-dark text-light">
            <tr>
                <th>ID</th>
                <th>IP Address</th>
                <th>Country Code</th>
                <th>Country Name</th>
                <th>City Name</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody class="bg-light text-dark">
            @forelse($objs as $obj)
            <tr class="table-row-hover">
                <td>{{ $obj->id }}</td>
                <td class="fw-bold">
                    <i class="bi bi-wifi me-1 text-primary"></i>{{ $obj->ip_address }}
                </td>
                <td>
                    <span class="badge bg-info text-white px-3 py-2">
                        {{ $obj->country_code ?? 'N/A' }}
                    </span>
                </td>
                <td>
                    <i class="bi bi-globe-americas me-1 text-secondary"></i>{{ $obj->country_name ?? 'Unknown' }}
                </td>
                <td>
                    <i class="bi bi-geo-alt me-1 text-secondary"></i>{{ $obj->city_name ?? 'Unknown' }}
                </td>
                <td class="text-nowrap">
                    <i class="bi bi-clock me-1"></i>{{ $obj->created_at?->format('d.m.Y H:i') ?? '—' }}
                </td>
                <td class="text-nowrap">
                    <i class="bi bi-clock-history me-1"></i>{{ $obj->updated_at?->format('d.m.Y H:i') ?? '—' }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center text-muted py-4 fw-bold">
                    No IP addresses found
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection