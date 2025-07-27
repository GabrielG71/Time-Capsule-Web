<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Capsule;

class CapsuleController extends Controller
{
    public function index()
    {
        $capsules = Capsule::where('user_id', auth()->id())->latest()->get();

        return Inertia::render('MyCapsules', [
            'capsules' => $capsules
        ]);
    }

    public function create()
    {
        return Inertia::render('AddCapsule');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'send_date' => 'required|date',
            'file' => 'nullable|file|max:10240',
        ]);

        if ($request->hasFile('file')) {
            $validated['file_path'] = $request->file('file')->store('capsule_files');
        }

        Capsule::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'send_date' => $validated['send_date'],
            'file_path' => $validated['file_path'] ?? null,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('capsules.index')->with('success', 'Capsule saved!');
    }
}