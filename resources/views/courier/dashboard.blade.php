@extends('layouts.app')

@section('content')
<div class="container">
    <h2>My Packages</h2>

    @forelse($packages as $package)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tracking #</th>
                <th>Sender</th>
                <th>Receiver</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $package->tracking_number }}</td>
                <td>{{ $package->sender_name }}</td>
                <td>{{ $package->receiver_name }}</td>
                <td>{{ $package->status }}</td>
                <td>
                    <form action="{{ route('courier.packages.status', $package->id) }}" method="POST">
                        @csrf @method('PUT')
                        <select name="status" class="form-select">
                            <option value="In Transit" {{ $package->status == 'In Transit' ? 'selected' : '' }}>In Transit</option>
                            <option value="Delivered" {{ $package->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                        </select>
                        <button type="submit" class="btn btn-primary btn-sm mt-2">Update</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>

    @empty
    <div class="alert alert-info mt-3">
        You have no packages yet.
    </div>
    @endforelse
</div>
@endsection
