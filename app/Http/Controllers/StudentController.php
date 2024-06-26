<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $students = Student::query()
                        ->latest()
                        ->paginate(10);

        return view('pages.student.index', [
            'students' => $students,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $validated = $request->validated();

        Student::create($validated);

        return to_route('student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $siswa)
    {
        return view('pages.student.edit', [
            'student' => $siswa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $siswa)
    {
        $validated = $request->validated();

        $siswa->update($validated);

        return to_route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $siswa)
    {
        $siswa->delete();
        return to_route('student.index');
    }
}
