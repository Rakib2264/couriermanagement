@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Manage Packages</h2>
    <a href="{{ route('packages.create') }}" class="btn btn-success mb-3">Create New</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tracking #</th>
                <th>Sender</th>
                <th>Receiver</th>
                <th>Status</th>
                <th>Courier</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($packages as $package)
            <tr>
                <td>{{ $package->tracking_number }}</td>
                <td>{{ $package->sender_name }}</td>
                <td>{{ $package->receiver_name }}</td>
                <td>{{ $package->status }}</td>
                <td>{{ $package->courier->name ?? 'Unassigned' }}</td>
                <td>
                    <a href="{{ route('packages.show', $package->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('packages.edit', $package->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('packages.destroy', $package->id) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
