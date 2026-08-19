<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PropertyCategoryController extends Controller
{
    public function index()
    {
        $categories = PropertyCategory::withCount('properties')->latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:property_categories',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:5120',
            'status' => 'boolean',
        ]);

        $category = PropertyCategory::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'description' => $validated['description'] ?? null,
            'status' => $request->has('status'),
            'created_by' => auth()->id(),
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('categories', 'public');
            $category->update(['image' => $path]);
        }

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function edit(PropertyCategory $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, PropertyCategory $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:property_categories,name,' . $category->id,
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:5120',
            'status' => 'boolean',
        ]);

        $category->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'description' => $validated['description'] ?? null,
            'status' => $request->has('status'),
            'updated_by' => auth()->id(),
        ]);

        if ($request->hasFile('image')) {
            if ($category->image) {
                Storage::delete($category->image);
            }
            $path = $request->file('image')->store('categories', 'public');
            $category->update(['image' => $path]);
        }

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy(PropertyCategory $category)
    {
        // Check if category has properties
        if ($category->properties()->count() > 0) {
            return redirect()->back()
                ->with('error', 'Cannot delete category with existing properties. Please reassign or delete properties first.');
        }

        if ($category->image) {
            Storage::delete($category->image);
        }

        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}