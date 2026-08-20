<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\PropertyFeature;
use App\Models\PropertyImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

class PropertyController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Property::class, 'property');
    }

    public function index(Request $request)
    {
        $query = Property::with(['category', 'images', 'creator']);

        if ($request->filled('search')) {
            $query->where('name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('location', 'LIKE', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('acquisition')) {
            $query->where('acquisition_type', $request->acquisition);
        }

        $properties = $query->latest()->paginate(15);
        $categories = PropertyCategory::all();

        return view('admin.properties.index', compact('properties', 'categories'));
    }

    public function create()
    {
        $categories = PropertyCategory::where('status', true)->get();
        $features = PropertyFeature::where('status', true)->get();
        $users = User::where('status', true)->get();

        return view('admin.properties.create', compact('categories', 'features', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'description' => 'nullable|string',
            'acquisition_type' => 'required|in:buying,renting',
            'category_id' => 'required|exists:property_categories,id',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|integer|min:0',
            'floor_area' => 'nullable|numeric|min:0',
            'land_area' => 'nullable|numeric|min:0',
            'car_parking' => 'nullable|integer|min:0',
            'price' => 'required|numeric|min:0',
            'currency' => 'required|string|max:10',
            'rent_frequency' => 'nullable|string|max:50',
            'status' => 'required|in:vacant,occupied',
            'main_image' => 'nullable|image|max:5120',
            'images.*' => 'nullable|image|max:5120',
            'features' => 'nullable|array',
            'features.*' => 'exists:property_features,id',
        ]);

        $property = Property::create([
            ...$validated,
            'slug' => Str::slug($validated['name'] . '-' . uniqid()),
            'created_by' => auth()->id(),
        ]);

        // Handle main image
        if ($request->hasFile('main_image')) {
            $path = $this->uploadImage($request->file('main_image'), 'properties');
            $property->update(['main_image' => $path]);
        }

        // Handle additional images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $this->uploadImage($image, 'properties');
                PropertyImage::create([
                    'property_id' => $property->id,
                    'image_path' => $path,
                    'is_main' => false,
                    'order' => $index,
                ]);
            }
        }

        // Attach features
        if ($request->filled('features')) {
            $property->features()->attach($request->features);
        }

        return redirect()->route('admin.properties.index')
            ->with('success', 'Property created successfully.');
    }

    

    public function show(Property $property)
    {
        $property->load(['category', 'images', 'features', 'creator', 'updater']);
        return view('admin.properties.show', compact('property'));
    }

    public function edit(Property $property)
    {
        $categories = PropertyCategory::where('status', true)->get();
        $features = PropertyFeature::where('status', true)->get();
        $users = User::where('status', true)->get();

        $property->load(['features', 'images']);

        return view('admin.properties.edit', compact('property', 'categories', 'features', 'users'));
    }

    public function update(Request $request, Property $property)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'description' => 'nullable|string',
            'acquisition_type' => 'required|in:buying,renting',
            'category_id' => 'required|exists:property_categories,id',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|integer|min:0',
            'floor_area' => 'nullable|numeric|min:0',
            'land_area' => 'nullable|numeric|min:0',
            'car_parking' => 'nullable|integer|min:0',
            'price' => 'required|numeric|min:0',
            'currency' => 'required|string|max:10',
            'rent_frequency' => 'nullable|string|max:50',
            'status' => 'required|in:vacant,occupied',
            'main_image' => 'nullable|image|max:5120',
            'images.*' => 'nullable|image|max:5120',
            'features' => 'nullable|array',
            'features.*' => 'exists:property_features,id',
        ]);

        $property->update([
            ...$validated,
            'updated_by' => auth()->id(),
        ]);

        // Handle main image
        if ($request->hasFile('main_image')) {
            // Delete old main image
            if ($property->main_image) {
                Storage::delete($property->main_image);
            }
            $path = $this->uploadImage($request->file('main_image'), 'properties');
            $property->update(['main_image' => $path]);
        }

        // Sync features
        $property->features()->sync($request->features ?? []);

        return redirect()->route('admin.properties.index')
            ->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property)
    {
        // Delete all images
        foreach ($property->images as $image) {
            Storage::delete($image->image_path);
            $image->delete();
        }

        if ($property->main_image) {
            Storage::delete($property->main_image);
        }

        $property->features()->detach();
        $property->delete();

        return redirect()->route('admin.properties.index')
            ->with('success', 'Property deleted successfully.');
    }

    public function changeStatus(Request $request, Property $property)
    {
        $request->validate([
            'status' => 'required|in:vacant,occupied',
        ]);

        $property->update([
            'status' => $request->status,
            'updated_by' => auth()->id(),
        ]);

        return redirect()->back()
            ->with('success', "Property status changed to {$request->status} successfully.");
    }

    public function uploadImage($file, $directory)
    {
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs($directory, $filename, 'public');
        return $path;
    }
}