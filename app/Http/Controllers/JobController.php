<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Person;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $job = Job::all();
        
        return view('job.index', compact('job'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $person = Person::all();

        return view('job.create', compact('person'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'people_id' => 'required',
            'job_title' => 'required',
            'company' => 'required',
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'nullable|date_format:Y-m-d'
        ], [
            'people_id.required' => 'wajib memilih orang',
            'job_title.required' => 'title wajib diisi',
            'company.required' => 'company wajib diisi',
            'start_date.required' => 'start wajib diisi',
            'start_date.date_format:Y-m-d' => 'start wajib tipe date',
            'end_date.date_format:Y-m-d' => 'end wajib tipe date'
        ]);

        Job::create([
            'people_id' => $request->input('people_id'),
            'job_title' => $request->input('job_title'),
            'company' => $request->input('company'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date')
        ]);

        return redirect()->route('job.index')->with('status', 'berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job = Job::with('person')->findOrFail($id);

        return view('job.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job = Job::findOrFail($id);

        $person = Person::all();

        return view('job.edit', compact('job', 'person'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $job = Job::findOrFail($id);

        $request->validate([
            'people_id' => 'required',
            'job_title' => 'required',
            'company' => 'required',
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'nullable|date_format:Y-m-d'
        ], [
            'people_id.required' => 'wajib memilih orang',
            'job_title.required' => 'title wajib diisi',
            'company.required' => 'company wajib diisi',
            'start_date.required' => 'start wajib diisi',
            'start_date.date_format:Y-m-d' => 'start wajib tipe date',
            'end_date.date_format:Y-m-d' => 'end wajib tipe date'
        ]);

        $job->update([
            'people_id' => $request->input('people_id'),
            'job_title' => $request->input('job_title'),
            'company' => $request->input('company'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date')
        ]);

        return redirect()->route('job.index')->with('status', 'berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $job = Job::findOrFail($id);

        $job->delete();

        return redirect()->route('job.index')->with('status', 'berhasil menghapus data');
    }
}
