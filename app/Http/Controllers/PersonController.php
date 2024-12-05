<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $person = Person::with('contact')
            ->where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('age', 'LIKE', '%' . $keyword . '%')
            ->orWhere('country', 'LIKE', '%' . $keyword . '%')
            ->paginate(5);


        return view('person.index', compact('person'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('person.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'country' => 'required'
        ], [
            'name.required' => 'nama wajib diisi',
            'age.required' => 'umur wajib diisi',
            'age.integer' => 'umur wajib berupa angka',
            'country.required' => 'alamat wajib diisi'
        ]);

        $person = Person::create($request->all());

        return redirect()->route('person.index')->with('status', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $person = Person::findOrFail($id);

        return view('person.edit', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $person = Person::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'age' => 'required',
            'country' => 'required'
        ], [
            'name.required' => 'nama wajib diisi',
            'age.required' => 'umur wajib diisi',
            'age.integer' => 'umur wajib berupa angka',
            'country.required' => 'alamat wajib diisi'
        ]);

        $person->update($request->all());

        return redirect()->route('person.index')->with('status', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $person = Person::findOrFail($id);

        $person->delete();

        return redirect()->route('person.index')->with('status', 'data berhasil dihapus');
    }
}
