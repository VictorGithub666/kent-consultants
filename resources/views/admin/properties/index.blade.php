{{-- resources/views/admin/properties/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Properties - Kent Consultants Ltd')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Properties</li>
@endsection

@section('content')
<div class="admin-page-header">
    <div>
        <h1>Properties</h1>
        <p class="text-muted">Manage all property listings</p>
    </div>
    <div>
        @can('create', App\Models\Property::class)
            <a href="{{ route('admin.properties.create') }}" class="btn btn-gold">
                <i class="bi bi-plus-lg"></i> Add Property
            </a>
        @endcan
    </div>
</div>

{{-- Filters --}}
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.properties.index') }}" class="row g-3 align-items-end">
            <div class="col-md-3">
                <label class="form-label">Search</label>
                <input type="text" name="search" class="form-control" placeholder="Search by name or location..." 
                       value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">Category</label>
                <select name="category" class="form-select">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="vacant" {{ request('status') == 'vacant' ? 'selected' : '' }}>Vacant</option>
                    <option value="occupied" {{ request('status') == 'occupied' ? 'selected' : '' }}>Occupied</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Acquisition</label>
                <select name="acquisition" class="form-select">
                    <option value="">All</option>
                    <option value="buying" {{ request('acquisition') == 'buying' ? 'selected' : '' }}>For Sale</option>
                    <option value="renting" {{ request('acquisition') == 'renting' ? 'selected' : '' }}>For Rent</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-gold w-100">
                    <i class="bi bi-search"></i> Filter
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Table --}}
<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            
            <table class="table table-admin mb-0">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Property Name</th>
                        <th>Category</th>
                        <th>Location</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Created By</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($properties as $property)
                        <tr>
                            <td>
                                <img src="{{ $property->main_image ? asset('storage/' . $property->main_image) : asset('images/property-placeholder.jpg') }}" 
                                     alt="{{ $property->name }}" width="50" height="50" style="object-fit:cover; border-radius:6px;">
                            </td>
                            <td>
                                <a href="{{ route('admin.properties.show', $property) }}" class="fw-semibold text-decoration-none">
                                    {{ Str::limit($property->name, 25) }}
                                </a>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark">{{ $property->category->name ?? 'N/A' }}</span>
                            </td>
                            <td>{{ Str::limit($property->location, 20) }}</td>
                            <td>
                                <span class="badge bg-{{ $property->acquisition_type === 'buying' ? 'info' : 'warning' }}">
                                    {{ $property->acquisition_type === 'buying' ? 'For Sale' : 'For Rent' }}
                                </span>
                            </td>
                            <td>
                                <span class="fw-semibold">
                                    {{ $property->currency }} {{ number_format($property->price, 0) }}
                                </span>
                            </td>
                            <td>
                                <span class="badge-status badge-{{ $property->status }}">
                                    {{ ucfirst($property->status) }}
                                </span>
                            </td>
                            <td>{{ $property->creator->name ?? 'N/A' }}</td>
                            <td class="text-end">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.properties.show', $property) }}" class="btn btn-outline-secondary" title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    @can('update', $property)
                                        <a href="{{ route('admin.properties.edit', $property) }}" class="btn btn-outline-primary" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    @endcan
                                    @can('delete', $property)
                                        <button type="button" class="btn btn-outline-danger" title="Delete" 
                                                data-bs-toggle="modal" data-bs-target="#deleteModal{{ $property->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    @endcan
                                    @can('changeStatus', $property)
                                        <button type="button" class="btn btn-outline-warning" title="Change Status"
                                                data-bs-toggle="modal" data-bs-target="#statusModal{{ $property->id }}">
                                            <i class="bi bi-arrow-repeat"></i>
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-4 text-muted">
                                <i class="bi bi-building fs-1 d-block mb-2"></i>
                                No properties found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-transparent">
        <div class="d-flex justify-content-between align-items-center">
            <span class="text-muted small">Showing {{ $properties->firstItem() ?? 0 }} to {{ $properties->lastItem() ?? 0 }} of {{ $properties->total() }} properties</span>
            {{ $properties->appends(request()->query())->links() }}
        </div>
    </div>
</div>

{{-- Status Change Modals --}}
@foreach($properties as $property)
    @can('changeStatus', $property)
    <div class="modal fade" id="statusModal{{ $property->id }}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.properties.change-status', $property) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p>Change status for <strong>{{ $property->name }}</strong></p>
                        <div class="form-group">
                            <select name="status" class="form-select">
                                <option value="vacant" {{ $property->status === 'vacant' ? 'selected' : '' }}>Vacant</option>
                                <option value="occupied" {{ $property->status === 'occupied' ? 'selected' : '' }}>Occupied</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-gold">Update Status</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endcan

    @can('delete', $property)
    <div class="modal fade" id="deleteModal{{ $property->id }}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Are you sure you want to delete <strong>{{ $property->name }}</strong>?</p>
                    <p class="text-muted small mb-0">This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="{{ route('admin.properties.destroy', $property) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endcan
@endforeach
@endsection