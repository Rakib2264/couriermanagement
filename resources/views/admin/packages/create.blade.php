@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create New Package</h2>

    {{-- Validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <form action="{{ route('packages.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="sender_name" class="form-label">Sender Name</label>
            <input type="text" name="sender_name" class="form-control" value="{{ old('sender_name') }}" required>
        </div>

        <div class="mb-3">
            <label for="receiver_name" class="form-label">Receiver Name</label>
            <input type="text" name="receiver_name" class="form-control" value="{{ old('receiver_name') }}" required>
        </div>

        <div class="mb-3">
            <label for="pickup_address" class="form-label">Pickup Address</label>
            <input type="text" name="pickup_address" class="form-control" value="{{ old('pickup_address') }}" required>
        </div>

        <div class="mb-3">
            <label for="delivery_address" class="form-label">Delivery Address</label>
            <input type="text" name="delivery_address" class="form-control" value="{{ old('delivery_address') }}" required>
        </div>

        <div class="mb-3">
            <label for="courier_id" class="form-label">Assign Courier</label>
            <select name="courier_id" class="form-select" required>
                <option value="">-- Select Courier --</option>
                @foreach($couriers as $courier)
                    <option value="{{ $courier->id }}" {{ old('courier_id') == $courier->id ? 'selected' : '' }}>
                        {{ $courier->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Create Package</button>
        <a href="{{ route('packages.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
