{{-- resources/views/partials/admin/sidebar.blade.php --}}
<aside class="admin-sidebar">
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
            <img src="{{ asset('images/logo.png') }}" alt="Kent Consultants Ltd">
            <span>Kent Consultants</span>
        </a>
        <button class="sidebar-toggle" id="sidebarToggle">
            <i class="bi bi-chevron-left"></i>
        </button>
    </div>

    <nav class="sidebar-nav">
        <ul>
            {{-- Dashboard --}}
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            {{-- Properties --}}
            @can('viewAny', App\Models\Property::class)
            <li class="nav-group {{ request()->routeIs('admin.properties.*') || request()->routeIs('admin.categories.*') || request()->routeIs('admin.features.*') ? 'active' : '' }}">
                <span class="nav-group-label">Properties</span>
                <ul>
                    <li class="nav-item">
                        <a href="{{ route('admin.properties.index') }}" class="nav-link {{ request()->routeIs('admin.properties.*') && !request()->routeIs('admin.properties.create') ? 'active' : '' }}">
                            <i class="bi bi-building"></i>
                            <span>All Properties</span>
                        </a>
                    </li>
                    @can('create', App\Models\Property::class)
                    <li class="nav-item">
                        <a href="{{ route('admin.properties.create') }}" class="nav-link {{ request()->routeIs('admin.properties.create') ? 'active' : '' }}">
                            <i class="bi bi-plus-circle"></i>
                            <span>Add Property</span>
                        </a>
                    </li>
                    @endcan
                    @can('viewAny', App\Models\PropertyCategory::class)
                    <li class="nav-item">
                        <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                            <i class="bi bi-tags"></i>
                            <span>Categories</span>
                        </a>
                    </li>
                    @endcan
                    @can('viewAny', App\Models\PropertyFeature::class)
                    <li class="nav-item">
                        <a href="{{ route('admin.features.index') }}" class="nav-link {{ request()->routeIs('admin.features.*') ? 'active' : '' }}">
                            <i class="bi bi-list-ul"></i>
                            <span>Features</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan

            {{-- Careers --}}
            @can('viewAny', App\Models\Career::class)
            <li class="nav-group {{ request()->routeIs('admin.careers.*') || request()->routeIs('admin.career-applications.*') ? 'active' : '' }}">
                <span class="nav-group-label">Careers</span>
                <ul>
                    <li class="nav-item">
                        <a href="{{ route('admin.careers.index') }}" class="nav-link {{ request()->routeIs('admin.careers.*') && !request()->routeIs('admin.careers.create') ? 'active' : '' }}">
                            <i class="bi bi-briefcase"></i>
                            <span>Job Listings</span>
                        </a>
                    </li>
                    @can('create', App\Models\Career::class)
                    <li class="nav-item">
                        <a href="{{ route('admin.careers.create') }}" class="nav-link {{ request()->routeIs('admin.careers.create') ? 'active' : '' }}">
                            <i class="bi bi-plus-circle"></i>
                            <span>Add Job</span>
                        </a>
                    </li>
                    @endcan
                    <li class="nav-item">
                        <a href="{{ route('admin.career-applications.index') }}" class="nav-link {{ request()->routeIs('admin.career-applications.*') ? 'active' : '' }}">
                            <i class="bi bi-people"></i>
                            <span>Applications</span>
                            @php
                                $newApplications = \App\Models\CareerApplication::where('status', 'new')->count();
                            @endphp
                            @if($newApplications > 0)
                                <span class="badge badge-danger">{{ $newApplications }}</span>
                            @endif
                        </a>
                    </li>
                </ul>
            </li>
            @endcan

            {{-- Users --}}
            @can('viewAny', App\Models\User::class)
            <li class="nav-group {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <span class="nav-group-label">Users</span>
                <ul>
                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                            <i class="bi bi-people"></i>
                            <span>All Users</span>
                        </a>
                    </li>
                    @can('create', App\Models\User::class)
                    <li class="nav-item">
                        <a href="{{ route('admin.users.create') }}" class="nav-link {{ request()->routeIs('admin.users.create') ? 'active' : '' }}">
                            <i class="bi bi-person-plus"></i>
                            <span>Add User</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan

            {{-- Website Settings --}}
            @can('manage-website-settings')
            <li class="nav-group {{ request()->routeIs('admin.website-settings.*') ? 'active' : '' }}">
                <span class="nav-group-label">Website</span>
                <ul>
                    <li class="nav-item">
                        <a href="{{ route('admin.website-settings.index') }}" class="nav-link {{ request()->routeIs('admin.website-settings.*') ? 'active' : '' }}">
                            <i class="bi bi-gear"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan
        </ul>
    </nav>

    <div class="sidebar-footer">
        <a href="{{ route('admin.profile.edit') }}" class="user-info text-decoration-none" title="My Profile">
            <img src="{{ auth()->user()->profile_photo ? asset('storage/' . auth()->user()->profile_photo) : asset('images/default-avatar.png') }}"
                 alt="{{ auth()->user()->name }}" class="user-avatar">
            <div class="user-details">
                <span class="user-name">{{ auth()->user()->name }}</span>
                <span class="user-role">{{ auth()->user()->role->name ?? 'User' }}</span>
            </div>
        </a>
        <form action="{{ route('admin.logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>