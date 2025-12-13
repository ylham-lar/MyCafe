@extends('admin.layouts.app')

@section('title', 'Visitors')

@section('content')
<div class="row align-items-center mb-3">
    <div class="col-auto h3 ps-5 ms-5">Visitors</div>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered align-middle text-center shadow-sm">
        <thead class="table-dark text-light">
            <tr>
                <th style="width:5%;">ID</th>
                <th style="width:10%;">IP Address</th>
                <th style="width:38%;">User Agent</th>
                <th style="width:5%;">Hits</th>
                <th style="width:5%;">Suspect</th>
                <th style="width:5%;">Robot</th>
                <th style="width:5%;">API</th>
                <th style="width:7%;">Status</th>
                <th style="width:10%;">Created At</th>
                <th style="width:10%;">Updated At</th>
            </tr>
        </thead>

        <tbody class="bg-light text-dark">
            @forelse($objs as $obj)
            <tr class="table-row-hover">
                <td class="text-muted fw-medium">{{ $obj->id }}</td>

                <td class="fw-bold">
                    @if($obj->ip_address)
                    <a href="{{ route('admin.ipaddress.index', ['ip_address_id' => $obj->ip_address_id]) }}"
                        class="text-decoration-none text-primary">
                        <i class="bi bi-wifi me-1"></i>{{ $obj->ip_address->ip_address }}
                    </a>
                    @else
                    —
                    @endif
                </td>

                <td class="text-break">
                    <i class="bi bi-terminal me-1 text-secondary"></i>
                    {{ $obj->useragent?->user_agent ?? 'Unknown' }}
                </td>

                <td>
                    <span class="badge bg-success text-white px-3 py-2">
                        {{ $obj->hits }}
                    </span>
                </td>

                <td>
                    <span class="badge bg-warning text-dark px-3 py-2">
                        {{ $obj->suspect_hits }}
                    </span>
                </td>

                <td>
                    <span class="badge px-3 py-2 {{ $obj->robot ? 'bg-warning text-dark' : 'bg-success text-white' }}">
                        {{ $obj->robot ? 'Yes' : 'No' }}
                    </span>
                </td>

                <td>
                    <span class="badge px-3 py-2 {{ $obj->api ? 'bg-info text-white' : 'bg-secondary text-white' }}">
                        {{ $obj->api ? 'API' : 'WEB' }}
                    </span>
                </td>

                <td>
                    <span class="badge px-3 py-2 {{ $obj->disable ? 'bg-danger text-white' : 'bg-success text-white' }}">
                        {{ $obj->disable ? 'Disabled' : 'Active' }}
                    </span>
                </td>

                <td class="text-nowrap">
                    <i class="bi bi-clock me-1"></i>
                    {{ $obj->created_at->format('H:i:s d.m.Y') }}
                </td>

                <td class="text-nowrap">
                    <i class="bi bi-clock-history me-1"></i>
                    {{ $obj->updated_at->format('H:i:s d.m.Y') }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="10" class="text-center text-muted py-4 fw-bold">
                    No visitors found
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection