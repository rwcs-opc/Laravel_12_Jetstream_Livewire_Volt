@extends('layouts.app_modern')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Add New Address</h4>
            <a href="{{ route('addresses.index') }}" class="btn btn-light btn-sm">← Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('addresses.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="address" class="form-label fw-semibold">Address</label>
                        <input type="text" name="address" class="form-control" value="{{ old('address') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="city" class="form-label fw-semibold">City</label>
                        <input type="text" name="city" class="form-control" value="{{ old('city') }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="state" class="form-label fw-semibold">State</label>
                        <input type="text" name="state" class="form-control" value="{{ old('state') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="country" class="form-label fw-semibold">Country</label>
                        <input type="text" name="country" class="form-control" value="{{ old('country', 'India') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="pin" class="form-label fw-semibold">Pin</label>
                        <input type="text" name="pin" class="form-control" value="{{ old('pin') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select">
                        <option value="default">Default</option>
                        <option value="home">Home</option>
                        <option value="office">Office</option>
                        <option value="others">Others</option>
                    </select>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success px-4">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
