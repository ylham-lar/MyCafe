@extends('admin.layouts.app')

@section('title', 'Edit Order')

@section('content')
<div class="container-sm py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">

            <h4 class="mb-4 text-dark">
                <a href="{{ route('admin.orders.index') }}" class="text-warning text-decoration-none">
                    Orders
                </a>
                <span class="text-muted">/ Edit</span>
            </h4>

            @if($errors->any())
            <div class="alert alert-danger rounded-3 shadow-sm">
                <ul class="mb-0 ps-3">
                    @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('admin.orders.update', $obj->id) }}" method="POST" class="bg-white p-4 rounded-4 shadow-sm">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">Customer *</label>
                    <select name="customer_id" class="form-select @error('customer_id') is-invalid @enderror" required>
                        @foreach($customers as $c)
                        <option value="{{ $c->id }}" {{ $obj->customer_id == $c->id ? 'selected' : '' }}>
                            {{ $c->phone_number }} - {{ $c->address }}
                        </option>
                        @endforeach
                    </select>
                    @error('customer_id')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                @php
                $orderProducts = json_decode($obj->products, true) ?: [];
                $selectedProductIds = array_column($orderProducts, 'id');
                $productQuantities = [];
                foreach($orderProducts as $item) {
                $productQuantities[$item['id']] = $item['quantity'];
                }
                @endphp

                <div class="mb-3">
                    <label class="form-label fw-semibold">Products *</label>
                    <div id="product-list" class="border rounded p-3 bg-light">
                        @foreach($products as $product)
                        @php
                        $hasDiscount = $product->discount_percent > 0;
                        $finalPrice = $hasDiscount ? $product->price * (1 - $product->discount_percent / 100) : $product->price;
                        $isChecked = in_array($product->id, $selectedProductIds);
                        $currentQuantity = $productQuantities[$product->id] ?? 1;
                        @endphp
                        <div class="form-check mb-2 p-2 bg-white rounded border">
                            <input class="form-check-input product-checkbox" type="checkbox" name="products[]" value="{{ $product->id }}" id="product{{ $product->id }}" data-price="{{ $finalPrice }}" data-original-price="{{ $product->price }}" data-discount="{{ $product->discount_percent }}" {{ $isChecked ? 'checked' : '' }}>
                            <label class="form-check-label w-100 d-flex justify-content-between align-items-center" for="product{{ $product->id }}">
                                <span>
                                    <strong>{{ $product->name }}</strong>
                                    @if($hasDiscount)
                                    <span class="badge bg-danger ms-2">-{{ $product->discount_percent }}%</span>
                                    @endif
                                </span>
                                <span>
                                    @if($hasDiscount)
                                    <span class="text-decoration-line-through text-muted small">{{ number_format($product->price) }}$</span>
                                    <span class="text-success fw-bold ms-2">{{ number_format($finalPrice, 2) }}$</span>
                                    @else
                                    <span class="text-success fw-bold">{{ number_format($product->price, 2) }}$</span>
                                    @endif
                                </span>
                            </label>
                            <input type="number" name="quantities[{{ $product->id }}]" class="form-control form-control-sm mt-2 quantity-input {{ $isChecked ? '' : 'd-none' }}" min="1" value="{{ $currentQuantity }}" style="max-width: 100px;">
                        </div>
                        @endforeach
                    </div>
                    @error('products')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Payment Method *</label>
                    <select name="payment_method" class="form-select @error('payment_method') is-invalid @enderror" required>
                        <option value="0" {{ $obj->payment_method == 0 ? 'selected' : '' }}>Cash</option>
                        <option value="1" {{ $obj->payment_method == 1 ? 'selected' : '' }}>Card</option>
                    </select>
                    @error('payment_method')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 p-3 bg-light rounded border">
                    <h5 class="mb-2">Order Summary</h5>
                    <div id="order-summary" class="text-muted">No products selected</div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-bold fs-5">Total Price:</span>
                        <span id="total-price" class="fw-bold text-success fs-4">0 $</span>
                    </div>
                </div>

                <div class="text-center d-flex justify-content-center gap-3">
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-warning px-4 py-2">
                        <i class="bi bi-arrow-left-circle me-1"></i> Back
                    </a>
                    <button type="submit" class="btn btn-warning px-4 py-2 text-dark">
                        <i class="bi bi-pencil-square me-1"></i> Update
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('.product-checkbox');
        const orderSummary = document.getElementById('order-summary');
        const totalPriceElement = document.getElementById('total-price');

        function updateOrderSummary() {
            let total = 0;
            let summaryHTML = '';
            let hasProducts = false;

            checkboxes.forEach(checkbox => {
                const quantityInput = checkbox.parentElement.querySelector('.quantity-input');

                if (checkbox.checked) {
                    hasProducts = true;
                    quantityInput.classList.remove('d-none');

                    const price = parseFloat(checkbox.dataset.price);
                    const originalPrice = parseFloat(checkbox.dataset.originalPrice);
                    const discount = parseFloat(checkbox.dataset.discount);
                    const quantity = parseInt(quantityInput.value) || 1;
                    const itemTotal = price * quantity;
                    total += itemTotal;

                    const label = checkbox.parentElement.querySelector('strong').textContent;

                    if (discount > 0) {
                        summaryHTML += `<div class="d-flex justify-content-between mb-1">
                        <span>${label} × ${quantity}</span>
                        <span><span class="text-decoration-line-through text-muted small">${Math.round(originalPrice)}$</span> <span class="text-success fw-bold">${Math.round(price)}$</span> = ${Math.round(itemTotal)}$</span>
                    </div>`;
                    } else {
                        summaryHTML += `<div class="d-flex justify-content-between mb-1">
                        <span>${label} × ${quantity}</span>
                        <span>${Math.round(itemTotal)}$</span>
                    </div>`;
                    }
                } else {
                    quantityInput.classList.add('d-none');
                }
            });

            orderSummary.innerHTML = hasProducts ? summaryHTML : '<div class="text-muted">No products selected</div>';
            totalPriceElement.textContent = Math.round(total) + ' $';
        }

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateOrderSummary);

            const quantityInput = checkbox.parentElement.querySelector('.quantity-input');
            quantityInput.addEventListener('input', updateOrderSummary);
        });

        updateOrderSummary();
    });
</script>

@endsection