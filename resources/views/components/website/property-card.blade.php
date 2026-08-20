{{-- resources/views/components/website/property-card.blade.php --}}
<div class="property-card">
    <div class="card-image">
        <img src="{{ $property->main_image ? asset('storage/' . $property->main_image) : asset('images/property-placeholder.jpg') }}" 
             alt="{{ $property->name }}" loading="lazy">
        <!-- <span class="badge-status badge-{{ $property->status }}">
            {{ ucfirst($property->status) }}
        </span> -->
        <span class="badge-type">
            {{ $property->acquisition_type === 'buying' ? 'For Sale' : 'For Rent' }}
        </span>
    </div>
    <div class="card-body">
        <h5 class="property-title">{{ $property->name }}</h5>
        <p class="property-location">
            <i class="bi bi-geo-alt"></i> {{ $property->location }}
        </p>
        <div class="property-details">
            @if($property->bedrooms)
                <span><i class="bi bi-door-open"></i> {{ $property->bedrooms }}</span>
            @endif
            @if($property->bathrooms)
                <span><i class="bi bi-droplet"></i> {{ $property->bathrooms }}</span>
            @endif
            @if($property->car_parking)
                <span><i class="bi bi-car-front"></i> {{ $property->car_parking }}</span>
            @endif
        </div>
        <div class="property-price">
            {{ $property->currency }} {{ number_format($property->price, 0) }}
            @if($property->acquisition_type === 'renting' && $property->rent_frequency)
                <span>/ {{ $property->rent_frequency }}</span>
            @endif
        </div>
        <a href="{{ route('properties.show', $property) }}" class="btn btn-gold w-100 mt-2">View Details</a>
    </div>
</div>