@extends('layouts.app_modern')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">View Address</h4>
            <a href="{{ route('addresses.index') }}" class="btn btn-light btn-sm">← Back</a>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <h6 class="fw-bold">Address:</h6>
                    <p>{{ $address->address }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="fw-bold">City:</h6>
                    <p>{{ $address->city }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <h6 class="fw-bold">State:</h6>
                    <p>{{ $address->state }}</p>
                </div>
                <div class="col-md-4">
                    <h6 class="fw-bold">Country:</h6>
                    <p>{{ $address->country }}</p>
                </div>
                <div class="col-md-4">
                    <h6 class="fw-bold">Pin:</h6>
                    <p>{{ $address->pin }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <h6 class="fw-bold">Status:</h6>
                    <span class="badge bg-secondary text-capitalize">{{ $address->status }}</span>
                </div>
                <div class="col-md-8 text-end">
                    <a href="{{ route('addresses.edit', $address->id) }}" class="btn btn-warning">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
