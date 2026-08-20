<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\Career;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // In app/Http/Controllers/Website/HomeController.php

public function index()
{
    $featuredProperties = Property::with(['category', 'images'])
        ->vacant()
        ->latest()
        ->take(6)
        ->get();

    $categories = PropertyCategory::where('status', true)
        ->withCount(['properties' => function ($query) {
            $query->vacant();
        }])
        ->get();

    $stats = [
        'total_properties' => Property::count(),  // ← FIX: Count ALL properties
        'residential' => Property::vacant()
            ->whereHas('category', function ($q) {
                $q->whereIn('slug', ['residential-estates', 'low-cost-housing', 'residential-towers']);
            })->count(),
        'commercial' => Property::vacant()
            ->whereHas('category', function ($q) {
                $q->where('slug', 'commercial-buildings');
            })->count(),
        'warehouses' => Property::vacant()
            ->whereHas('category', function ($q) {
                $q->where('slug', 'warehouses');
            })->count(),
    ];

    return view('website.index', compact('featuredProperties', 'categories', 'stats'));
}

    public function about()
    {
        return view('website.about');
    }

    public function services()
    {
        return view('website.services');
    }

    public function contact()
    {
        return view('website.contact');
    }

}