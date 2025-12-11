@extends('client.layouts.app')

@section('content')
<div class="container py-5">

    <h2 class="mb-4">Sargyt maglumatlary</h2>

    <form action="{{ route('client.customer.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Address *</label>
            <input type="text" name="address" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Telefon belgisi</label>
            <input type="text" name="phone_number" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Tassykla</button>
    </form>

</div>
@endsection