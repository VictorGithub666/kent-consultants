<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\PropertyFeature;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::with(['category', 'images', 'features'])
            ->vacant();

        // Filters
        if ($request->filled('acquisition_type')) {
            $query->where('acquisition_type', $request->acquisition_type);
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('bedrooms')) {
            $query->where('bedrooms', '>=', $request->bedrooms);
        }

        if ($request->filled('bathrooms')) {
            $query->where('bathrooms', '>=', $request->bathrooms);
        }

        if ($request->filled('price_min')) {
            $query->where('price', '>=', $request->price_min);
        }

        if ($request->filled('price_max')) {
            $query->where('price', '<=', $request->price_max);
        }

        if ($request->filled('location')) {
            $query->where('location', 'LIKE', '%' . $request->location . '%');
        }

        if ($request->filled('features')) {
            $query->whereHas('features', function ($q) use ($request) {
                $q->whereIn('property_features.id', $request->features);
            });
        }

        // Sorting
        $sort = $request->get('sort', 'newest');
        switch ($sort) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        $properties = $query->paginate(12);
        $categories = PropertyCategory::where('status', true)->get();
        $features = PropertyFeature::where('status', true)->get();

        return view('website.properties.index', compact('properties', 'categories', 'features'));
    }

    public function show(Property $property)
    {
        // Ensure property is vacant for public viewing
        if ($property->isOccupied()) {
            abort(404);
        }

        $property->load(['category', 'images', 'features', 'creator']);
        $similarProperties = Property::with(['category', 'images'])
            ->where('id', '!=', $property->id)
            ->where('category_id', $property->category_id)
            ->vacant()
            ->limit(3)
            ->get();

        return view('website.properties.show', compact('property', 'similarProperties'));
    }

    public function category($slug)
    {
        $category = PropertyCategory::where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        $properties = Property::with(['category', 'images'])
            ->where('category_id', $category->id)
            ->vacant()
            ->paginate(12);

        return view('website.properties.category', compact('category', 'properties'));
    }
}