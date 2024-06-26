<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use App\Http\Requests\StoreExtracurricularRequest;
use App\Http\Requests\UpdateExtracurricularRequest;

class ExtracurricularController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $extracurriculars = Extracurricular::query()
                            ->latest()
                            ->paginate(10);
        return view('pages.extracurricular.index', [
            'extracurriculars' => $extracurriculars,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.extracurricular.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExtracurricularRequest $request)
    {
        $validated = $request->validated();

        Extracurricular::create($validated);

        return to_route('extracurricular.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Extracurricular $extracurricular)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Extracurricular $ekskul)
    {
        // dd($ekskul);
        return view('pages.extracurricular.edit', [
            'extracurricular' => $ekskul,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExtracurricularRequest $request, Extracurricular $ekskul)
    {
        $validated = $request->validated();

        $ekskul->update($validated);

        return to_route('extracurricular.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Extracurricular $ekskul)
    {
        $ekskul->delete();
        return to_route('extracurricular.index');
    }
}
