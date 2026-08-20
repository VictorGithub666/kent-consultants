<?php
// app/Http/Controllers/Admin/ContactMessageController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(ContactMessage::class, 'message');
    }

    public function index(Request $request)
    {
        $query = ContactMessage::with(['responder']);

        if ($request->filled('search')) {
            $query->where('name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('email', 'LIKE', '%' . $request->search . '%')
                ->orWhere('subject', 'LIKE', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $messages = $query->latest()->paginate(15);
        return view('admin.contact-messages.index', compact('messages'));
    }

    public function show(ContactMessage $message)
    {
        // Mark as read if it was new
        if ($message->status === 'new') {
            $message->update(['status' => 'read']);
        }

        $message->load(['responder']);
        return view('admin.contact-messages.show', compact('message'));
    }

    public function update(Request $request, ContactMessage $message)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,read,responded,archived',
        ]);

        $data = [
            'status' => $validated['status'],
        ];

        if ($validated['status'] === 'responded') {
            $data['responded_by'] = auth()->id();
            $data['responded_at'] = now();
        }

        $message->update($data);

        return redirect()->back()
            ->with('success', "Message status updated to {$validated['status']}.");
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();

        return redirect()->route('admin.contact-messages.index')
            ->with('success', 'Message deleted successfully.');
    }
}