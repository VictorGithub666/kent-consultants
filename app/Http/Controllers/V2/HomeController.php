<?php

namespace App\Http\Controllers\V2;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\CareerApplication;
use App\Models\Property;
use App\Models\PropertyCategory;
use Illuminate\Http\Request;

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

        $developments = Property::with('category')
            ->whereNotNull('main_image')
            ->latest()
            ->take(12)
            ->get();

        return view('v2.index', compact('categories', 'stats', 'developments'));
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

    public function careerApply(Request $request, Career $career)
    {
        $data = $request->validate([
            'name'         => ['required', 'string', 'max:255'],
            'email'        => ['required', 'email', 'max:255'],
            'phone'        => ['nullable', 'string', 'max:50'],
            'cover_letter' => ['nullable', 'string'],
            'cv'           => ['required', 'file', 'mimes:pdf,doc,docx', 'max:5120'],
        ]);

        $cvPath = $request->file('cv')->store('cvs', 'public');

        CareerApplication::create([
            'career_id'      => $career->id,
            'applicant_name' => $data['name'],
            'email'          => $data['email'],
            'phone'          => $data['phone'] ?? null,
            'cover_letter'   => $data['cover_letter'] ?? null,
            'cv_path'        => $cvPath,
            'status'         => 'new',
        ]);

        return back()->with('success', 'Your application has been submitted successfully. We will be in touch!');
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
