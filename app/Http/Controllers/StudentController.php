<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'nisn' => 'required|string|max:20|unique:students',
            'address' => 'required|string',
            'gender' => 'required|in:L,P',
            'photo' => 'nullable|image|max:2048',
        ]);

        $student = new Student($request->all());

        if ($request->hasFile('photo')) {
            $student->photo = $request->file('photo')->store('photos', 'public');
        }

        $student->save();

        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'nisn' => 'required|string|max:20|unique:students,nisn,' . $student->id,
            'address' => 'required|string',
            'gender' => 'required|in:L,P',
            'photo' => 'nullable|image|max:2048',
        ]);

        $student->fill($request->all());

        if ($request->hasFile('photo')) {
            if ($student->photo) {
                Storage::disk('public')->delete($student->photo);
            }
            $student->photo = $request->file('photo')->store('photos', 'public');
        }

        $student->save();

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        if ($student->photo) {
            Storage::disk('public')->delete($student->photo);
        }

        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
