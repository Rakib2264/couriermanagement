@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Admin Dashboard</h2>

    <div class="row">
        <div class="col-md-6">
            <h4>Package Status Distribution</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Status</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($statusCounts as $status)
                    <tr>
                        <td>{{ $status->status }}</td>
                        <td>{{ $status->total }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-6">
            <h4>Courier Performance</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Courier</th>
                        <th>Delivered Packages</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($couriers as $courier)
                    <tr>
                        <td>{{ $courier->name }}</td>
                        <td>{{ $courier->delivered_count }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
