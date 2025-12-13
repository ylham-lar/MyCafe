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
                <th>ID</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Products</th>
                <th>Total Price</th>
                <th>Payment</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="bg-light text-dark">
            @forelse($objs as $obj)
            @php
            $products = json_decode($obj->products, true) ?: [];

            $totalPrice = 0;
            foreach($products as $item) {
            $productId = $item['id'] ?? null;
            $price = floatval($item['price'] ?? 0);
            $quantity = intval($item['quantity'] ?? 0);

            $discount = 0;
            if(isset($item['discount_percent'])) {
            $discount = floatval($item['discount_percent']);
            } elseif($productId) {
            $product = \App\Models\Product::find($productId);
            $discount = $product ? floatval($product->discount_percent ?? 0) : 0;
            }

            $finalPrice = $discount > 0 ? $price * (1 - $discount / 100) : $price;
            $totalPrice += $finalPrice * $quantity;
            }
            @endphp

            <tr class="table-row-hover">
                <td>{{ $obj->id }}</td>
                <td>+{{ $obj->customer->phone_number ?? '---' }}</td>
                <td>{{ $obj->customer->address ?? '---' }}</td>
                <td>
                    @if(count($products))
                    <button class="btn btn-sm btn-dark" type="button" data-bs-toggle="collapse" data-bs-target="#products-{{ $obj->id }}">
                        {{ array_sum(array_column($products, 'quantity')) }} items
                    </button>
                    @else
                    <span class="text-muted">0</span>
                    @endif
                </td>
                <td class="fw-bold text-success">{{ number_format($totalPrice, 2) }} $</td>
                <td>
                    <span class="badge {{ $obj->payment_method ? 'bg-success' : 'bg-secondary' }}">
                        {{ $obj->payment_method ? 'Card' : 'Cash' }}
                    </span>
                </td>
                <td>{{ $obj->created_at->format('d.m.Y H:i') }}</td>
                <td>
                    <a href="{{ route('admin.orders.edit', $obj->id) }}" class="btn btn-sm btn-outline-dark btn-warning">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $obj->id }}">
                        <i class="bi bi-trash-fill"></i>
                    </button>

                    <div class="modal fade" id="deleteModal-{{ $obj->id }}" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 shadow-lg rounded-4 bg-dark text-light">
                                <div class="modal-header border-0 p-3" style="background: linear-gradient(90deg, #dc3545, #b02a37);">
                                    <h5 class="modal-title fw-bold">Confirm Deletion</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body p-4 text-center">
                                    <i class="bi bi-exclamation-triangle-fill text-warning fs-1 mb-3"></i>
                                </div>
                                <div class="modal-footer justify-content-center border-0 mb-3">
                                    <form method="POST" action="{{ route('admin.orders.destroy', $obj->id) }}" class="d-flex gap-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-outline-secondary px-4 fw-bold" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger px-4 fw-bold"><i class="bi bi-trash-fill me-1"></i> Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>

            @if(count($products))
            <tr class="collapse" id="products-{{ $obj->id }}">
                <td colspan="8">
                    <div class="p-3">
                        <table class="table table-bordered text-center mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Original Price</th>
                                    <th>Discount %</th>
                                    <th>Final Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $grandTotal = 0;
                                @endphp
                                @foreach($products as $item)
                                @php
                                $productId = $item['id'] ?? null;
                                $price = floatval($item['price'] ?? 0);
                                $quantity = intval($item['quantity'] ?? 0);

                                $discount = 0;
                                if(isset($item['discount_percent'])) {
                                $discount = floatval($item['discount_percent']);
                                } elseif($productId) {
                                $product = \App\Models\Product::find($productId);
                                $discount = $product ? floatval($product->discount_percent ?? 0) : 0;
                                }

                                $hasDiscount = $discount > 0;
                                $finalPrice = $hasDiscount ? $price * (1 - $discount / 100) : $price;
                                $itemTotal = $finalPrice * $quantity;
                                $grandTotal += $itemTotal;
                                @endphp
                                <tr>
                                    <td>{{ $item['name'] ?? 'N/A' }}</td>
                                    <td>
                                        @if($hasDiscount)
                                        <span class="text-decoration-line-through text-muted">{{ number_format($price, 2) }} $</span>
                                        @else
                                        {{ number_format($price, 2) }} $
                                        @endif
                                    </td>
                                    <td>
                                        @if($hasDiscount)
                                        <span class="badge bg-danger">-{{ number_format($discount, 0) }}%</span>
                                        @else
                                        <span class="text-muted">---</span>
                                        @endif
                                    </td>
                                    <td class="fw-bold text-success">{{ number_format($finalPrice, 2) }} $</td>
                                    <td>{{ $quantity }}</td>
                                    <td class="fw-bold">{{ number_format($itemTotal, 2) }} $</td>
                                </tr>
                                @endforeach

                                <tr class="">
                                    <td colspan="5" class="text-end fw-bold fs-5">Grand Total:</td>
                                    <td class="fw-bold text-warning fs-5">{{ number_format($grandTotal, 2) }} $</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
            @endif

            @empty
            <tr>
                <td colspan="8" class="text-center text-muted py-4 fw-bold">No orders found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>


@endsection