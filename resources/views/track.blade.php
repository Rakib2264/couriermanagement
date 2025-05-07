@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Track Package</div>
                <div class="card-body">
                    <form action="{{ route('track') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Enter Tracking Number</label>
                            <input type="text" name="tracking_number" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Track</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
