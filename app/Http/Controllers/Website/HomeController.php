<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\Career;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
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
            'total_properties' => Property::vacant()->count(),
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

    public function contactSubmit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $message = ContactMessage::create($validated);

        // Send notification email to admin
        try {
            Mail::to('info@kentconsultantsltd.co.ke')->send(new \App\Mail\ContactNotification($message));
        } catch (\Exception $e) {
            // Log error but don't stop the process
            \Log::error('Failed to send contact email: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Your message has been sent. We will get back to you soon.');
    }
}