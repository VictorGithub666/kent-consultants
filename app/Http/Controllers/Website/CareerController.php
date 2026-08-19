<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\CareerApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::where('status', 'published')
            ->where('application_deadline', '>=', now())
            ->latest()
            ->paginate(10);

        return view('website.careers.index', compact('careers'));
    }

    public function show(Career $career)
    {
        if ($career->status !== 'published' || $career->application_deadline < now()) {
            abort(404);
        }

        return view('website.careers.show', compact('career'));
    }

    public function apply(Request $request, Career $career)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'cover_letter' => 'nullable|string',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:5120',
        ]);

        // Store CV
        $cvPath = $request->file('cv')->store('cvs', 'private');

        CareerApplication::create([
            'career_id' => $career->id,
            'applicant_name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'cover_letter' => $validated['cover_letter'] ?? null,
            'cv_path' => $cvPath,
            'status' => 'new',
        ]);

        return redirect()->back()->with('success', 'Your application has been submitted successfully.');
    }
}