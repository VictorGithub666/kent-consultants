{{-- resources/views/admin/features/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Property Features - Kent Consultants Ltd')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Features</li>
@endsection

@section('content')
<div class="admin-page-header">
    <div>
        <h1>Property Features</h1>
        <p class="text-muted">Manage property features and amenities</p>
    </div>
    <div>
        @can('create', App\Models\PropertyFeature::class)
            <a href="{{ route('admin.features.create') }}" class="btn btn-gold">
                <i class="bi bi-plus-lg"></i> Add Feature
            </a>
        @endcan
    </div>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-admin mb-0">
                <thead>
                    <tr>
                        <th>Icon</th>
                        <th>Name</th>
                        <th>Used By</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($features as $feature)
                        <tr>
                            <td>
                                @if($feature->icon)
                                    <i class="{{ $feature->icon }}" style="font-size:1.5rem;"></i>
                                @else
                                    <span class="text-muted">No icon</span>
                                @endif
                            </td>
                            <td>
                                <span class="fw-semibold">{{ $feature->name }}</span>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark">{{ $feature->properties_count }}</span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $feature->status ? 'success' : 'danger' }}">
                                    {{ $feature->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="btn-group btn-group-sm">
                                    @can('update', $feature)
                                        <a href="{{ route('admin.features.edit', $feature) }}" class="btn btn-outline-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    @endcan
                                    @can('delete', $feature)
                                        <button type="button" class="btn btn-outline-danger" 
                                                data-bs-toggle="modal" data-bs-target="#deleteModal{{ $feature->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">
                                <i class="bi bi-list-ul fs-1 d-block mb-2"></i>
                                No features found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-transparent">
        <div class="d-flex justify-content-between align-items-center">
            <span class="text-muted small">Showing {{ $features->firstItem() ?? 0 }} to {{ $features->lastItem() ?? 0 }} of {{ $features->total() }} features</span>
            {{ $features->links() }}
        </div>
    </div>
</div>

{{-- Delete Modals --}}
@foreach($features as $feature)
    @can('delete', $feature)
    <div class="modal fade" id="deleteModal{{ $feature->id }}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Are you sure you want to delete <strong>{{ $feature->name }}</strong>?</p>
                    <p class="text-muted small mb-0">This will remove this feature from all properties.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="{{ route('admin.features.destroy', $feature) }}" method="POST" style="display:inline;">
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