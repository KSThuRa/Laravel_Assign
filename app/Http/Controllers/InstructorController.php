<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function index()
    {
        $instructors = Instructor::all();

        return view('instructors.index', compact('instructors'));
    }

    public function create()
    {
        return view('instructors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:instructors,email',
            'phone' => 'required|string|max:20',
        ]);

        Instructor::create($validated);

        return redirect()
            ->route('instructors.index')
            ->with('success', 'Instructor created successfully.');
    }

    public function show(Instructor $instructor)
    {
        return view('instructors.show', compact('instructor'));
    }

    public function edit(Instructor $instructor)
    {
        return view('instructors.edit', compact('instructor'));
    }

    public function update(Request $request, Instructor $instructor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:instructors,email,' . $instructor->id,
            'phone' => 'required|string|max:20',
        ]);

        $instructor->update($validated);

        return redirect()
            ->route('instructors.index')
            ->with('success', 'Instructor updated successfully.');
    }

    public function destroy(Instructor $instructor)
    {
        $instructor->delete();

        return redirect()
            ->route('instructors.index')
            ->with('success', 'Instructor deleted successfully.');
    }
}
