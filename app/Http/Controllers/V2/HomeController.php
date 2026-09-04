<?php

namespace App\Http\Controllers\V2;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\Career;

class HomeController extends Controller
{
    public function index()
    {
        $categories = PropertyCategory::where('status', true)->get();

        $stats = [
            'total_properties' => Property::count(),
            'residential'      => Property::vacant()
                ->whereHas('category', fn ($q) => $q->whereIn('slug', [
                    'residential-estates', 'low-cost-housing', 'residential-towers',
                ]))->count(),
            'commercial'       => Property::vacant()
                ->whereHas('category', fn ($q) => $q->where('slug', 'commercial-buildings'))
                ->count(),
            'warehouses'       => Property::vacant()
                ->whereHas('category', fn ($q) => $q->where('slug', 'warehouses'))
                ->count(),
        ];

        return view('v2.index', compact('categories', 'stats'));
    }

    public function about()
    {
        return view('v2.about');
    }

    public function services()
    {
        return view('v2.services');
    }

    public function contact()
    {
        return view('v2.contact');
    }

    public function careers()
    {
        $careers = Career::where('status', 'open')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('v2.careers.index', compact('careers'));
    }

    public function careerShow(Career $career)
    {
        return view('v2.careers.show', compact('career'));
    }

    public function propertyManagement()
    {
        return view('v2.property-management');
    }

    public function propertiesIndex()
    {
        $categories  = PropertyCategory::where('status', true)->with('properties')->get();
        $properties  = Property::with('category')->latest()->paginate(12);

        return view('v2.properties.index', compact('categories', 'properties'));
    }

    public function propertiesCategory(string $slug)
    {
        $category   = PropertyCategory::where('slug', $slug)->where('status', true)->firstOrFail();
        $properties = $category->properties()->latest()->paginate(12);

        return view('v2.properties.category', compact('category', 'properties'));
    }
}
