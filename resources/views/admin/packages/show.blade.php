@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Package Details</h2>

    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Tracking Number: {{ $package->tracking_number }}</h5>

            <p><strong>Sender Name:</strong> {{ $package->sender_name }}</p>
            <p><strong>Receiver Name:</strong> {{ $package->receiver_name }}</p>
            <p><strong>Pickup Address:</strong> {{ $package->pickup_address }}</p>
            <p><strong>Delivery Address:</strong> {{ $package->delivery_address }}</p>
            <p><strong>Status:</strong>
                <span class="badge bg-primary">{{ $package->status }}</span>
            </p>

            @if($package->courier)
                <p><strong>Assigned Courier:</strong> {{ $package->courier->name }}</p>
            @else
                <p><strong>Assigned Courier:</strong> Not Assigned</p>
            @endif

            <p><strong>Created At:</strong> {{ $package->created_at->format('d M Y, h:i A') }}</p>
            <p><strong>Last Updated:</strong> {{ $package->updated_at->format('d M Y, h:i A') }}</p>

            <a href="{{ route('packages.index') }}" class="btn btn-secondary mt-3">Back to List</a>
        </div>
    </div>
</div>
@endsection
