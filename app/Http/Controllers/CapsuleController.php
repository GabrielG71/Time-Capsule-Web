<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Capsule;
use Illuminate\Support\Facades\Auth;

class CapsuleController extends Controller
{
    public function index()
    {
        // Debug para verificar autenticação
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $capsules = Capsule::where('user_id', Auth::id())->latest()->get();

        return Inertia::render('MyCapsules', [
            'capsules' => $capsules
        ]);
    }

    public function create()
    {
        // Debug para verificar autenticação
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return Inertia::render('AddCapsule');
    }

    public function store(Request $request)
    {
        // Verificar se usuário está autenticado
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'send_date' => 'required|date',
            'file' => 'nullable|file|max:10240',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('capsule_files', 'public');
        }

        Capsule::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'send_date' => $validated['send_date'],
            'file_path' => $filePath,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('capsules.index')->with('success', 'Capsule saved!');
    }
}
