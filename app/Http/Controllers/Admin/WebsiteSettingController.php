<?php
// app/Http/Controllers/Admin/WebsiteSettingController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;

class WebsiteSettingController extends Controller
{
    public function __construct()
    {
        // Only Super Admin can manage website settings
        $this->middleware('can:manage-website-settings');
    }

    public function index()
    {
        $settings = WebsiteSetting::all()->groupBy('group');
        return view('admin.website-settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'settings' => 'required|array',
            'settings.*' => 'nullable|string',
        ]);

        foreach ($validated['settings'] as $key => $value) {
            WebsiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return redirect()->route('admin.website-settings.index')
            ->with('success', 'Website settings updated successfully.');
    }

    public function updateGroup(Request $request, $group)
    {
        $validated = $request->validate([
            'settings' => 'required|array',
            'settings.*' => 'nullable|string',
        ]);

        foreach ($validated['settings'] as $key => $value) {
            WebsiteSetting::updateOrCreate(
                ['key' => $key, 'group' => $group],
                ['value' => $value]
            );
        }

        return redirect()->route('admin.website-settings.index')
            ->with('success', 'Settings updated successfully.');
    }
}