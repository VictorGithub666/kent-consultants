{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.admin')

@section('title', 'Dashboard - Kent Consultants Ltd')

@section('content')
<div class="admin-page-header">
    <h1>Dashboard</h1>
    <p>Welcome back, {{ auth()->user()->name }}</p>
</div>

{{-- Stats Cards --}}
<div class="row g-4 mb-4">
    <div class="col-lg-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="bi bi-building"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $stats['total_properties'] }}</h3>
                <p>Total Properties</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="stat-card success">
            <div class="stat-icon">
                <i class="bi bi-check-circle"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $stats['vacant_properties'] }}</h3>
                <p>Vacant Properties</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="stat-card danger">
            <div class="stat-icon">
                <i class="bi bi-x-circle"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $stats['occupied_properties'] }}</h3>
                <p>Occupied Properties</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="stat-card warning">
            <div class="stat-icon">
                <i class="bi bi-person"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $stats['total_users'] }}</h3>
                <p>Total Users</p>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-3 col-6">
        <div class="stat-card small">
            <div class="stat-info">
                <h4>{{ $stats['properties_for_rent'] }}</h4>
                <p>For Rent</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-6">
        <div class="stat-card small">
            <div class="stat-info">
                <h4>{{ $stats['properties_for_sale'] }}</h4>
                <p>For Sale</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-6">
        <div class="stat-card small">
            <div class="stat-info">
                <h4>{{ $stats['active_careers'] }}</h4>
                <p>Active Careers</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-6">
        <div class="stat-card small">
            <div class="stat-info">
                <h4>{{ $stats['new_messages'] }}</h4>
                <p>New Messages</p>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    {{-- Recently Added --}}
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5>Recently Added Properties</h5>
            </div>
            <div class="card-body">
                @if($recentProperties->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
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
                                        <td>{{ $property->name }}</td>
                                        <td>{{ $property->category->name ?? 'N/A' }}</td>
                                        <td><span class="badge bg-{{ $property->status === 'vacant' ? 'success' : 'danger' }}">{{ ucfirst($property->status) }}</span></td>
                                        <td>{{ $property->creator->name ?? 'N/A' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted">No properties added yet.</p>
                @endif
            </div>
        </div>
    </div>
    
    {{-- Recently Updated --}}
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5>Recently Updated Properties</h5>
            </div>
            <div class="card-body">
                @if($recentlyUpdated->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Property</th>
                                    <th>Status</th>
                                    <th>Updated By</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentlyUpdated as $property)
                                    <tr>
                                        <td>{{ $property->name }}</td>
                                        <td><span class="badge bg-{{ $property->status === 'vacant' ? 'success' : 'danger' }}">{{ ucfirst($property->status) }}</span></td>
                                        <td>{{ $property->updater->name ?? 'N/A' }}</td>
                                        <td>{{ $property->updated_at->diffForHumans() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted">No recent updates.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection