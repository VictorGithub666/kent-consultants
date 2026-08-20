{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.admin')

@section('title', 'Dashboard - Kent Consultants Ltd')

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
<div class="admin-page-header">
    <div>
        <h1>Dashboard</h1>
        <p class="text-muted">Welcome back, {{ auth()->user()->name }}</p>
    </div>
    <div>
        <span class="badge bg-gold">{{ now()->format('l, F j, Y') }}</span>
    </div>
</div>

{{-- Stats Cards --}}
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="stat-card">
            <div class="stat-icon bg-gold">
                <i class="bi bi-building"></i>
            </div>
            <div class="stat-info">
                <h3>{{ number_format($stats['total_properties']) }}</h3>
                <p>Total Properties</p>
            </div>
            <div class="stat-change text-success">
                <i class="bi bi-arrow-up"></i> 12%
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="stat-card">
            <div class="stat-icon bg-success">
                <i class="bi bi-check-circle"></i>
            </div>
            <div class="stat-info">
                <h3>{{ number_format($stats['vacant_properties']) }}</h3>
                <p>Vacant Properties</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="stat-card">
            <div class="stat-icon bg-danger">
                <i class="bi bi-x-circle"></i>
            </div>
            <div class="stat-info">
                <h3>{{ number_format($stats['occupied_properties']) }}</h3>
                <p>Occupied Properties</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="stat-card">
            <div class="stat-icon bg-info">
                <i class="bi bi-people"></i>
            </div>
            <div class="stat-info">
                <h3>{{ number_format($stats['total_users']) }}</h3>
                <p>Total Users</p>
            </div>
        </div>
    </div>
</div>

{{-- Secondary Stats --}}
<div class="row g-4 mb-4">
    <div class="col-md-3 col-6">
        <div class="stat-card small">
            <div class="stat-info">
                <h4>{{ number_format($stats['properties_for_rent']) }}</h4>
                <p>For Rent</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-6">
        <div class="stat-card small">
            <div class="stat-info">
                <h4>{{ number_format($stats['properties_for_sale']) }}</h4>
                <p>For Sale</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-6">
        <div class="stat-card small">
            <div class="stat-info">
                <h4>{{ number_format($stats['active_careers']) }}</h4>
                <p>Active Careers</p>
            </div>
        </div>
    </div>
</div>

{{-- Category Breakdown --}}
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="stat-card small">
            <div class="stat-info">
                <h4>{{ number_format($stats['residential_properties']) }}</h4>
                <p>Residential Properties</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card small">
            <div class="stat-info">
                <h4>{{ number_format($stats['commercial_properties']) }}</h4>
                <p>Commercial Properties</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card small">
            <div class="stat-info">
                <h4>{{ number_format($stats['warehouses']) }}</h4>
                <p>Warehouses</p>
            </div>
        </div>
    </div>
</div>

{{-- Recent Activity --}}
<div class="row g-4">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5><i class="bi bi-clock-history"></i> Recently Added Properties</h5>
            </div>
            <div class="card-body p-0">
                @if($recentProperties->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Property</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Added By</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentProperties as $property)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.properties.show', $property) }}" class="text-decoration-none">
                                                {{ Str::limit($property->name, 25) }}
                                            </a>
                                        </td>
                                        <td>{{ $property->category->name ?? 'N/A' }}</td>
                                        <td>
                                            <span class="badge bg-{{ $property->status === 'vacant' ? 'success' : 'danger' }}">
                                                {{ ucfirst($property->status) }}
                                            </span>
                                        </td>
                                        <td>{{ $property->creator->name ?? 'N/A' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="empty-state p-4 text-center">
                        <i class="bi bi-building fs-1 text-muted"></i>
                        <p class="text-muted">No properties added yet.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5><i class="bi bi-pencil-square"></i> Recently Updated Properties</h5>
            </div>
            <div class="card-body p-0">
                @if($recentlyUpdated->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Property</th>
                                    <th>Status</th>
                                    <th>Updated By</th>
                                    <th>When</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentlyUpdated as $property)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.properties.show', $property) }}" class="text-decoration-none">
                                                {{ Str::limit($property->name, 25) }}
                                            </a>
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $property->status === 'vacant' ? 'success' : 'danger' }}">
                                                {{ ucfirst($property->status) }}
                                            </span>
                                        </td>
                                        <td>{{ $property->updater->name ?? 'N/A' }}</td>
                                        <td>{{ $property->updated_at->diffForHumans() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="empty-state p-4 text-center">
                        <i class="bi bi-pencil fs-1 text-muted"></i>
                        <p class="text-muted">No recent updates.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .stat-card {
        background: var(--white);
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        transition: transform 0.2s, box-shadow 0.2s;
        height: 100%;
        position: relative;
        overflow: hidden;
    }
    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 30px rgba(0,0,0,0.08);
    }
    .stat-card .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: var(--white);
        margin-bottom: 12px;
    }
    .stat-card .stat-icon.bg-gold {
        background: var(--gold-gradient);
    }
    .stat-card .stat-info h3 {
        font-size: 1.8rem;
        font-weight: 700;
        margin: 0;
        color: var(--charcoal);
    }
    .stat-card .stat-info p {
        margin: 0;
        color: var(--text-muted);
        font-size: 0.9rem;
    }
    .stat-card .stat-change {
        position: absolute;
        top: 16px;
        right: 16px;
        font-size: 0.75rem;
        font-weight: 600;
        padding: 2px 10px;
        border-radius: 20px;
        background: rgba(40, 167, 69, 0.1);
    }
    .stat-card.small .stat-info h4 {
        font-size: 1.4rem;
        font-weight: 600;
        margin: 0;
    }
    .stat-card.small .stat-info p {
        font-size: 0.8rem;
    }
    .bg-gold {
        background: var(--gold-gradient);
    }
    .badge-gold {
        background: var(--gold-gradient);
        color: var(--charcoal);
    }
    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        overflow: hidden;
    }
    .card-header {
        background: transparent;
        border-bottom: 1px solid rgba(0,0,0,0.05);
        padding: 16px 20px;
    }
    .card-header h5 {
        margin: 0;
        font-weight: 600;
        color: var(--charcoal);
    }
    .card-header h5 i {
        color: var(--gold-1);
        margin-right: 8px;
    }
    .table th {
        font-weight: 600;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: var(--text-muted);
        border-bottom: 2px solid rgba(0,0,0,0.05);
    }
    .admin-page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
    }
    .admin-page-header h1 {
        font-size: 1.8rem;
        font-weight: 700;
        margin: 0;
        color: var(--charcoal);
    }
    .admin-page-header p {
        margin: 0;
    }
    .empty-state i {
        display: block;
        margin-bottom: 12px;
        opacity: 0.5;
    }
    .empty-state p {
        margin: 0;
    }
</style>
@endpush