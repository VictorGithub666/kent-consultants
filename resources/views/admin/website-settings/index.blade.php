{{-- resources/views/admin/website-settings/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Website Settings - Kent Consultants Ltd')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Website Settings</li>
@endsection

@section('content')
<div class="admin-page-header">
    <div>
        <h1>Website Settings</h1>
        <p class="text-muted">Manage global website configuration</p>
    </div>
</div>

@php
    // Flatten settings grouped by key for easy access
    $flat = $settings->flatten()->keyBy('key');
@endphp

<form action="{{ route('admin.website-settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- General --}}
    <div class="card mb-4">
        <div class="card-header">
            <h5><i class="bi bi-globe"></i> General</h5>
        </div>
        <div class="card-body">
            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label">Site Name</label>
                    <input type="text" name="settings[site_name]" class="form-control"
                           value="{{ $flat['site_name']->value ?? 'Kent Consultants Ltd' }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tagline</label>
                    <input type="text" name="settings[site_tagline]" class="form-control"
                           value="{{ $flat['site_tagline']->value ?? '' }}"
                           placeholder="Your trusted property partner">
                </div>
                <div class="col-12">
                    <label class="form-label">Site Description (Meta)</label>
                    <textarea name="settings[site_description]" class="form-control" rows="2"
                              placeholder="Used for SEO meta description">{{ $flat['site_description']->value ?? '' }}</textarea>
                </div>
            </div>
        </div>
    </div>

    {{-- Contact Info --}}
    <div class="card mb-4">
        <div class="card-header">
            <h5><i class="bi bi-telephone"></i> Contact Information</h5>
        </div>
        <div class="card-body">
            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label">Primary Phone</label>
                    <input type="text" name="settings[phone_primary]" class="form-control"
                           value="{{ $flat['phone_primary']->value ?? '' }}" placeholder="+254 700 000 000">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Secondary Phone</label>
                    <input type="text" name="settings[phone_secondary]" class="form-control"
                           value="{{ $flat['phone_secondary']->value ?? '' }}" placeholder="+254 700 000 001">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Primary Email</label>
                    <input type="email" name="settings[email_primary]" class="form-control"
                           value="{{ $flat['email_primary']->value ?? '' }}" placeholder="info@kentconsultantsltd.co.ke">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Enquiries Email</label>
                    <input type="email" name="settings[email_enquiries]" class="form-control"
                           value="{{ $flat['email_enquiries']->value ?? '' }}" placeholder="enquiries@kentconsultantsltd.co.ke">
                </div>
                <div class="col-12">
                    <label class="form-label">Physical Address</label>
                    <input type="text" name="settings[address]" class="form-control"
                           value="{{ $flat['address']->value ?? '' }}" placeholder="123 Business Park, Nairobi">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Office Hours</label>
                    <input type="text" name="settings[office_hours]" class="form-control"
                           value="{{ $flat['office_hours']->value ?? '' }}" placeholder="Mon–Fri: 8AM–5PM">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Maps Embed URL</label>
                    <input type="url" name="settings[maps_url]" class="form-control"
                           value="{{ $flat['maps_url']->value ?? '' }}" placeholder="https://maps.google.com/embed?...">
                </div>
            </div>
        </div>
    </div>

    {{-- Social Media --}}
    <div class="card mb-4">
        <div class="card-header">
            <h5><i class="bi bi-share"></i> Social Media Links</h5>
        </div>
        <div class="card-body">
            <div class="row g-4">
                @foreach([
                    'social_facebook'  => ['Facebook',  'bi bi-facebook'],
                    'social_twitter'   => ['Twitter/X', 'bi bi-twitter-x'],
                    'social_instagram' => ['Instagram',  'bi bi-instagram'],
                    'social_linkedin'  => ['LinkedIn',   'bi bi-linkedin'],
                    'social_youtube'   => ['YouTube',    'bi bi-youtube'],
                    'social_whatsapp'  => ['WhatsApp',   'bi bi-whatsapp'],
                ] as $key => [$label, $icon])
                    <div class="col-md-6">
                        <label class="form-label">
                            <i class="{{ $icon }} me-1"></i> {{ $label }}
                        </label>
                        <input type="url" name="settings[{{ $key }}]" class="form-control"
                               value="{{ $flat[$key]->value ?? '' }}" placeholder="https://...">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- SEO --}}
    <div class="card mb-4">
        <div class="card-header">
            <h5><i class="bi bi-search"></i> SEO & Analytics</h5>
        </div>
        <div class="card-body">
            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label">Google Analytics ID</label>
                    <input type="text" name="settings[google_analytics_id]" class="form-control"
                           value="{{ $flat['google_analytics_id']->value ?? '' }}" placeholder="G-XXXXXXXXXX">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Google Site Verification</label>
                    <input type="text" name="settings[google_site_verification]" class="form-control"
                           value="{{ $flat['google_site_verification']->value ?? '' }}">
                </div>
                <div class="col-12">
                    <label class="form-label">Custom Header Scripts</label>
                    <textarea name="settings[header_scripts]" class="form-control" rows="3"
                              placeholder="Paste tracking pixels or scripts here...">{{ $flat['header_scripts']->value ?? '' }}</textarea>
                    <small class="text-muted">Injected inside &lt;head&gt;. Super Admin only.</small>
                </div>
            </div>
        </div>
    </div>

    {{-- Properties --}}
    <div class="card mb-4">
        <div class="card-header">
            <h5><i class="bi bi-building"></i> Property Defaults</h5>
        </div>
        <div class="card-body">
            <div class="row g-4">
                <div class="col-md-4">
                    <label class="form-label">Default Currency</label>
                    <select name="settings[default_currency]" class="form-select">
                        @foreach(['KSh', 'USD', 'EUR', 'GBP'] as $cur)
                            <option value="{{ $cur }}" {{ ($flat['default_currency']->value ?? 'KSh') === $cur ? 'selected' : '' }}>
                                {{ $cur }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Properties Per Page</label>
                    <select name="settings[properties_per_page]" class="form-select">
                        @foreach([6, 9, 12, 15, 24] as $n)
                            <option value="{{ $n }}" {{ ($flat['properties_per_page']->value ?? '12') == $n ? 'selected' : '' }}>
                                {{ $n }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    {{-- Submit --}}
    <div class="d-flex gap-3">
        <button type="submit" class="btn btn-gold btn-lg">
            <i class="bi bi-check-lg"></i> Save Settings
        </button>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-lg">Cancel</a>
    </div>
</form>
@endsection

@push('styles')
<style>
    .card-header h5 i { color: var(--gold-1); margin-right: 8px; }
</style>
@endpush
