<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    public function index()
    {
        $batches = Batch::all();

        return view('batches.index', compact('batches'));
    }

    public function create()
    {
        return view('batches.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Batch::create($validated);

        return redirect()
            ->route('batches.index')
            ->with('success', 'Batch created successfully.');
    }

    public function destroy(Batch $batch)
    {
        $batch->delete();

        return redirect()
            ->route('batches.index')
            ->with('success', 'Batch deleted successfully.');
    }
}
