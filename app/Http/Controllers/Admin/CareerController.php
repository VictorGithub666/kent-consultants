<?php
// app/Http/Controllers/Admin/CareerController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CareerController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Career::class, 'career');
    }

    public function index(Request $request)
    {
        $query = Career::with(['creator', 'updater']);

        if ($request->filled('search')) {
            $query->where('job_title', 'LIKE', '%' . $request->search . '%')
                ->orWhere('department', 'LIKE', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $careers = $query->latest()->paginate(10);
        return view('admin.careers.index', compact('careers'));
    }

    public function create()
    {
        return view('admin.careers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'employment_type' => 'required|string|max:100',
            'description' => 'required|string',
            'responsibilities' => 'nullable|string',
            'requirements' => 'nullable|string',
            'application_deadline' => 'required|date|after:today',
            'status' => 'required|in:draft,published,closed',
        ]);

        $validated['slug'] = Str::slug($validated['job_title'] . '-' . uniqid());
        $validated['created_by'] = auth()->id();

        Career::create($validated);

        return redirect()->route('admin.careers.index')
            ->with('success', 'Career listing created successfully.');
    }

    public function show(Career $career)
    {
        $career->load(['creator', 'updater', 'applications']);
        return view('admin.careers.show', compact('career'));
    }

    public function edit(Career $career)
    {
        return view('admin.careers.edit', compact('career'));
    }

    public function update(Request $request, Career $career)
    {
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'employment_type' => 'required|string|max:100',
            'description' => 'required|string',
            'responsibilities' => 'nullable|string',
            'requirements' => 'nullable|string',
            'application_deadline' => 'required|date|after:today',
            'status' => 'required|in:draft,published,closed',
        ]);

        $validated['updated_by'] = auth()->id();
        $career->update($validated);

        return redirect()->route('admin.careers.index')
            ->with('success', 'Career listing updated successfully.');
    }

    public function destroy(Career $career)
    {
        $career->delete();

        return redirect()->route('admin.careers.index')
            ->with('success', 'Career listing deleted successfully.');
    }

    public function changeStatus(Request $request, Career $career)
    {
        $request->validate([
            'status' => 'required|in:draft,published,closed',
        ]);

        $career->update([
            'status' => $request->status,
            'updated_by' => auth()->id(),
        ]);

        return redirect()->back()
            ->with('success', "Career status changed to {$request->status} successfully.");
    }
}