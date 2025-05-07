@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Package</h2>

    <form action="{{ route('packages.update', $package) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="sender_name" class="form-label">Sender Name</label>
            <input type="text" name="sender_name" class="form-control" value="{{ old('sender_name', $package->sender_name) }}" required>
        </div>

        <div class="mb-3">
            <label for="receiver_name" class="form-label">Receiver Name</label>
            <input type="text" name="receiver_name" class="form-control" value="{{ old('receiver_name', $package->receiver_name) }}" required>
        </div>

        <div class="mb-3">
            <label for="pickup_address" class="form-label">Pickup Address</label>
            <input type="text" name="pickup_address" class="form-control" value="{{ old('pickup_address', $package->pickup_address) }}" required>
        </div>

        <div class="mb-3">
            <label for="delivery_address" class="form-label">Delivery Address</label>
            <input type="text" name="delivery_address" class="form-control" value="{{ old('delivery_address', $package->delivery_address) }}" required>
        </div>

        <div class="mb-3">
            <label for="courier_id" class="form-label">Courier</label>
            <select name="courier_id" class="form-select" required>
                <option value="">-- Select Courier --</option>
                @foreach($couriers as $courier)
                    <option value="{{ $courier->id }}" {{ $package->courier_id == $courier->id ? 'selected' : '' }}>
                        {{ $courier->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Package</button>
    </form>
</div>
@endsection
