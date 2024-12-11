<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $person = Person::where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('age', 'LIKE', '%' . $keyword . '%')
            ->orWhere('country', 'LIKE', '%' . $keyword . '%')
            ->paginate(5)->withQueryString();


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
            'country' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000'

        ], [
            'name.required' => 'nama wajib diisi',
            'age.required' => 'umur wajib diisi',
            'age.integer' => 'umur wajib berupa angka',
            'country.required' => 'alamat wajib diisi',
            'image.mimes' => 'foto wajib jpeg/jpg/png/gif',
            'image.max' => 'ukuran gambar terlalu besar'
        ]);

        $input = $request->all();

        $image = $request->file('image');
        $image->storeAs('public/image', $image->hashName());

        $input['image'] = $image->hashName();

        Person::create($input);

        return redirect()->route('person.index')->with('status', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $person = Person::with('contact')->findOrFail($id);

        return view('person.show', compact('person'));
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

        $input = $request->all();
        
        if ($request->hasFile('image')) {
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/image', $image->hashName());
            
            //delete old image
            Storage::delete('public/image/' . $person->image);
            
            $input['image'] = $image->hashName();
        } else {
            
            unset($input['image']);
        }

        $person->update($input);



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

    public function deletes()
    {
        $person = Person::onlyTrashed()->get();

        return view('person.deletes', compact('person'));
    }

    public function restore($id)
    {
        $person = Person::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('person.index')->with('status', 'data berhasil direstore');
    }
}

