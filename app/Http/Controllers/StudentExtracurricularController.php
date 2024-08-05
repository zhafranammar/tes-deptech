<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentExtracurricular;
use Illuminate\Http\Request;

class StudentExtracurricularController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $extracurriculars = StudentExtracurricular::with('student')->get();
        return view('extracurriculars.index', compact('extracurriculars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        return view('extracurriculars.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'extracurricular_name' => 'required|string|max:255',
            'start_year' => 'required|integer|digits:4',
        ]);

        StudentExtracurricular::create($request->all());

        return redirect()->route('extracurriculars.index')->with('success', 'Data ekstrakurikuler berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentExtracurricular $extracurricular)
    {
        $students = Student::all();
        return view('extracurriculars.show', compact('extracurricular', 'students'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentExtracurricular $extracurricular)
    {
        $students = Student::all();
        return view('extracurriculars.edit', compact('extracurricular', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentExtracurricular $extracurricular)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'extracurricular_name' => 'required|string|max:255',
            'start_year' => 'required|integer|digits:4',
        ]);

        $extracurricular->update($request->all());

        return redirect()->route('extracurriculars.index')->with('success', 'Data ekstrakurikuler berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentExtracurricular $extracurricular)
    {
        $extracurricular->delete();

        return redirect()->route('extracurriculars.index')->with('success', 'Data ekstrakurikuler berhasil dihapus.');
    }
}
