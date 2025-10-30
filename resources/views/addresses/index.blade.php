@extends('layouts.app_admin2')

@section('title','Addresses List')
@section('content')
<div class="container mt-1">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">My Addresses</h4>
            <a href="{{ route('addresses.create') }}" class="btn btn-success btn-sm">+ Add New Address</a>
        </div>

        <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>Pin</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($addresses as $address)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $address->address }}</td>
                            <td>{{ $address->city }}</td>
                            <td>{{ $address->state }}</td>
                            <td>{{ $address->country }}</td>
                            <td>{{ $address->pin }}</td>
                            <td>
                                <span class="badge 
                                        @if($address->status == 'default') bg-primary
                                        @elseif($address->status == 'home') bg-success
                                        @elseif($address->status == 'office') bg-info
                                        @else bg-secondary @endif
                                        text-capitalize">
                                    {{ $address->status }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('addresses.show', $address->id) }}"
                                    class="btn btn-sm btn-outline-info me-1">View</a>
                                <a href="{{ route('addresses.edit', $address->id) }}"
                                    class="btn btn-sm btn-outline-warning me-1">Edit</a>
                                <form action="{{ route('addresses.destroy', $address->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Are you sure you want to delete this address?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">
                                <i class="bi bi-geo-alt"></i> No addresses found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection