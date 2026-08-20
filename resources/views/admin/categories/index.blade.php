{{-- resources/views/admin/categories/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Property Categories - Kent Consultants Ltd')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Categories</li>
@endsection

@section('content')
<div class="admin-page-header">
    <div>
        <h1>Property Categories</h1>
        <p class="text-muted">Manage property categories</p>
    </div>
    <div>
        @can('create', App\Models\PropertyCategory::class)
            <a href="{{ route('admin.categories.create') }}" class="btn btn-gold">
                <i class="bi bi-plus-lg"></i> Add Category
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
                        <th>Image</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Properties</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>
                                @if($category->image)
                                    <img src="{{ asset('storage/' . $category->image) }}" 
                                         alt="{{ $category->name }}" width="50" height="50" style="object-fit:cover; border-radius:6px;">
                                @else
                                    <span class="text-muted">No image</span>
                                @endif
                            </td>
                            <td>
                                <span class="fw-semibold">{{ $category->name }}</span>
                            </td>
                            <td><code>{{ $category->slug }}</code></td>
                            <td>{{ Str::limit($category->description ?? 'N/A', 30) }}</td>
                            <td>
                                <span class="badge bg-light text-dark">{{ $category->properties_count }}</span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $category->status ? 'success' : 'danger' }}">
                                    {{ $category->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="btn-group btn-group-sm">
                                    @can('update', $category)
                                        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-outline-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    @endcan
                                    @can('delete', $category)
                                        <button type="button" class="btn btn-outline-danger" 
                                                data-bs-toggle="modal" data-bs-target="#deleteModal{{ $category->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                <i class="bi bi-tags fs-1 d-block mb-2"></i>
                                No categories found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-transparent">
        <div class="d-flex justify-content-between align-items-center">
            <span class="text-muted small">Showing {{ $categories->firstItem() ?? 0 }} to {{ $categories->lastItem() ?? 0 }} of {{ $categories->total() }} categories</span>
            {{ $categories->links() }}
        </div>
    </div>
</div>

{{-- Delete Modals --}}
@foreach($categories as $category)
    @can('delete', $category)
    <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Are you sure you want to delete <strong>{{ $category->name }}</strong>?</p>
                    @if($category->properties_count > 0)
                        <p class="text-danger small mb-0">⚠️ This category has {{ $category->properties_count }} properties. Please reassign or delete them first.</p>
                    @else
                        <p class="text-muted small mb-0">This action cannot be undone.</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    @if($category->properties_count == 0)
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endcan
@endforeach
@endsection