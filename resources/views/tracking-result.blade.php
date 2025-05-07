<!-- resources/views/tracking/result.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tracking Result</h2>

    @if($package)
        <table class="table">
            <tr><th>Tracking #</th><td>{{ $package->tracking_number }}</td></tr>
            <tr><th>Sender</th><td>{{ $package->sender_name }}</td></tr>
            <tr><th>Receiver</th><td>{{ $package->receiver_name }}</td></tr>
            <tr><th>Status</th><td>{{ $package->status }}</td></tr>
            <tr><th>Courier</th><td>{{ $package->courier ? $package->courier->name : 'Not Assigned' }}</td></tr>
        </table>
    @else
        <div class="alert alert-danger">No package found with this tracking number.</div>
    @endif
</div>
@endsection
