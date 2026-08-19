<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Career;
use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_properties' => Property::count(),
            'vacant_properties' => Property::vacant()->count(),
            'occupied_properties' => Property::occupied()->count(),
            'properties_for_rent' => Property::forRent()->count(),
            'properties_for_sale' => Property::forSale()->count(),
            'residential_properties' => Property::whereHas('category', function ($q) {
                $q->whereIn('slug', ['residential-estates', 'low-cost-housing', 'residential-towers']);
            })->count(),
            'commercial_properties' => Property::whereHas('category', function ($q) {
                $q->where('slug', 'commercial-buildings');
            })->count(),
            'warehouses' => Property::whereHas('category', function ($q) {
                $q->where('slug', 'warehouses');
            })->count(),
            'active_careers' => Career::where('status', 'published')->count(),
            'new_applications' => \App\Models\CareerApplication::where('status', 'new')->count(),
            'new_messages' => ContactMessage::where('status', 'new')->count(),
            'total_users' => User::count(),
        ];

        $recentProperties = Property::with(['category', 'creator'])
            ->latest()
            ->take(5)
            ->get();

        $recentlyUpdated = Property::with(['category', 'updater'])
            ->whereNotNull('updated_at')
            ->orderBy('updated_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentProperties', 'recentlyUpdated'));
    }
}