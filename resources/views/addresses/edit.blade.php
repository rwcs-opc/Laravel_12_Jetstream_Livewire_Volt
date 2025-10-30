@extends('layouts.app_admin2')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Edit Address</h4>
            <a href="{{ route('addresses.index') }}" class="btn btn-light btn-sm">← Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('addresses.update', $address->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Address</label>
                        <input type="text" name="address" class="form-control"
                            value="{{ old('address', $address->address) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">City</label>
                        <input type="text" name="city" class="form-control" value="{{ old('city', $address->city) }}"
                            required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">State</label>
                        <input type="text" name="state" class="form-control"
                            value="{{ old('state', $address->state) }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Country</label>
                        <input type="text" name="country" class="form-control"
                            value="{{ old('country', $address->country) }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Pin</label>
                        <input type="text" name="pin" class="form-control" value="{{ old('pin', $address->pin) }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select">
                        <option value="default" {{ $address->status == 'default' ? 'selected' : '' }}>Default</option>
                        <option value="home" {{ $address->status == 'home' ? 'selected' : '' }}>Home</option>
                        <option value="office" {{ $address->status == 'office' ? 'selected' : '' }}>Office</option>
                        <option value="others" {{ $address->status == 'others' ? 'selected' : '' }}>Others</option>
                    </select>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary px-4">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection