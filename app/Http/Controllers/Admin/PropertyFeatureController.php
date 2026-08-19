<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyFeature;
use Illuminate\Http\Request;

class PropertyFeatureController extends Controller
{
    public function index()
    {
        $features = PropertyFeature::withCount('properties')->latest()->paginate(10);
        return view('admin.features.index', compact('features'));
    }

    public function create()
    {
        return view('admin.features.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:property_features',
            'icon' => 'nullable|string|max:100',
            'status' => 'boolean',
        ]);

        PropertyFeature::create([
            'name' => $validated['name'],
            'icon' => $validated['icon'] ?? null,
            'status' => $request->has('status'),
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('admin.features.index')
            ->with('success', 'Feature created successfully.');
    }

    public function edit(PropertyFeature $feature)
    {
        return view('admin.features.edit', compact('feature'));
    }

    public function update(Request $request, PropertyFeature $feature)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:property_features,name,' . $feature->id,
            'icon' => 'nullable|string|max:100',
            'status' => 'boolean',
        ]);

        $feature->update([
            'name' => $validated['name'],
            'icon' => $validated['icon'] ?? null,
            'status' => $request->has('status'),
            'updated_by' => auth()->id(),
        ]);

        return redirect()->route('admin.features.index')
            ->with('success', 'Feature updated successfully.');
    }

    public function destroy(PropertyFeature $feature)
    {
        $feature->properties()->detach();
        $feature->delete();

        return redirect()->route('admin.features.index')
            ->with('success', 'Feature deleted successfully.');
    }
}