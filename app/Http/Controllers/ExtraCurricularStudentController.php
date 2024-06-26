<?php

namespace App\Http\Controllers;

use App\Models\ExtraCurricularStudent;
use App\Http\Requests\StoreExtraCurricularStudentRequest;
use App\Http\Requests\UpdateExtraCurricularStudentRequest;
use App\Models\Extracurricular;
use App\Models\Student;

class ExtraCurricularStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = ExtraCurricularStudent::query()
                            ->with(['student', 'extracurricular'])
                            ->latest()
                            ->paginate(10);
        return view('pages.extracurricular-student.index', [
            'datas' => $datas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $students = Student::all();
        $extracurriculars = Extracurricular::all();

        return view('pages.extracurricular-student.create', [
            'students' => $students,
            'extracurriculars' => $extracurriculars,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExtraCurricularStudentRequest $request)
    {
        $validated = $request->validated();

        ExtraCurricularStudent::create($validated);

        return to_route('extracurricular-student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ExtraCurricularStudent $extraCurricularStudent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExtraCurricularStudent $siswa_ekskul)
    {
        $students = Student::all();
        $extracurriculars = Extracurricular::all();

        return view('pages.extracurricular-student.edit', [
            'students' => $students,
            'extracurriculars' => $extracurriculars,
            'siswa_ekskul' => $siswa_ekskul,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExtraCurricularStudentRequest $request, ExtraCurricularStudent $siswa_ekskul)
    {
        $validated = $request->validated();

        ExtraCurricularStudent::create($validated);

        return to_route('extracurricular-student.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExtraCurricularStudent $siswa_ekskul)
    {
        $siswa_ekskul->delete();
        return to_route('extracurricular-student.index');
    }
}
