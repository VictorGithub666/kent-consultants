<?php
// app/Http/Controllers/Admin/CareerApplicationController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CareerApplicationController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(CareerApplication::class, 'application');
    }

    public function index(Request $request)
    {
        $query = CareerApplication::with(['career']);

        if ($request->filled('search')) {
            $query->where('applicant_name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('email', 'LIKE', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('career_id')) {
            $query->where('career_id', $request->career_id);
        }

        $applications = $query->latest()->paginate(15);
        return view('admin.career-applications.index', compact('applications'));
    }

    public function show(CareerApplication $application)
    {
        $application->load(['career']);
        return view('admin.career-applications.show', compact('application'));
    }

    public function update(Request $request, CareerApplication $application)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,reviewing,shortlisted,interview,accepted,rejected',
        ]);

        $application->update($validated);

        return redirect()->back()
            ->with('success', "Application status updated to {$validated['status']}.");
    }

    public function downloadCV(CareerApplication $application)
    {
        $path = storage_path('app/private/' . $application->cv_path);

        if (!file_exists($path)) {
            abort(404, 'CV file not found.');
        }

        return response()->download($path, $application->applicant_name . '-CV.pdf');
    }

    public function destroy(CareerApplication $application)
    {
        // Delete CV file
        if ($application->cv_path && Storage::exists($application->cv_path)) {
            Storage::delete($application->cv_path);
        }

        $application->delete();

        return redirect()->route('admin.career-applications.index')
            ->with('success', 'Application deleted successfully.');
    }
}