<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Person;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = Contact::with('person')->get();

        return view('contact.index', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $person = Person::all();

        return view('contact.create', compact('person'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'people_id' => 'required',
            'phone' => 'required',
            'email' => 'required|email'
        ], [
            'people_id.required' => 'wajib memilih orang',
            'phone.required' => 'no telp wajib disis',
            'email.required' => 'email wajib diisi',
            'email.email' => 'harus berupa format email'
        ]);

        if ($validated) {
            Contact::create([
                'people_id' => $request->input('people_id'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email')
            ]);

            return redirect()->route('contact.index')->with('status', 'berhasil menambahkan data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::with('person')->findOrFail($id);

        return view('contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = Contact::with('person')->findOrFail($id);

        $person = Person::all();

        return view('contact.edit', compact('contact', 'person'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contact = Contact::findOrFail($id);

        $request->validate([
            'people_id' => 'required',
            'phone' => 'required',
            'email' => 'required|email'
        ], [
            'people_id.required' => 'wajib memilih orang',
            'phone.required' => 'no telp wajib disis',
            'email.required' => 'email wajib diisi',
            'email.email' => 'harus berupa format email'
        ]);

        $contact->update([
            'people_id' => $request->input('people_id'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email')
        ]);

        return redirect()->route('contact.index')->with('status', 'berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);
        
        $contact->delete();

        return redirect()->route('contact.index')->with('status', 'berhasil menghapus data');
    }
}
