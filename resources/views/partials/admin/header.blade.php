{{-- resources/views/partials/admin/header.blade.php --}}
<header class="admin-header">
    <div class="header-left">
        <button class="header-toggle" id="headerToggle">
            <i class="bi bi-list"></i>
        </button>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @yield('breadcrumb')
            </ol>
        </nav>
    </div>
    <div class="header-right">
        <div class="header-notifications">
            @php
                $newApplications = \App\Models\CareerApplication::where('status', 'new')->count();
            @endphp
            <div class="dropdown">
                <button class="btn btn-notification" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-bell"></i>
                    @if($newApplications > 0)
                        <span class="notification-dot">{{ $newApplications }}</span>
                    @endif
                </button>
                <ul class="dropdown-menu dropdown-menu-end notification-menu">
                    <li><h6 class="dropdown-header">Notifications</h6></li>
                    @if($newApplications > 0)
                        <li>
                            <a href="{{ route('admin.career-applications.index', ['status' => 'new']) }}" class="dropdown-item">
                                <i class="bi bi-people"></i>
                                {{ $newApplications }} new job application(s)
                            </a>
                        </li>
                    @endif
                    @if($newApplications == 0)
                        <li><span class="dropdown-item text-muted">No new notifications</span></li>
                    @endif
                </ul>
            </div>
        </div>
        <a href="{{ route('admin.profile.edit') }}" class="header-user text-decoration-none" title="My Profile">
            <img src="{{ auth()->user()->profile_photo ? asset('storage/' . auth()->user()->profile_photo) : asset('images/default-avatar.png') }}"
                 alt="{{ auth()->user()->name }}" class="user-avatar-sm">
            <span class="user-name-sm">{{ auth()->user()->name }}</span>
        </a>
    </div>
</header>