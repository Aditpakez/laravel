<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Fakultas;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodi = Prodi::with('fakultas')->orderBy('created_at', 'desc')->get();
        return view('prodi.list-prodi', compact('prodi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas = Fakultas::all();
        return view('prodi.add-prodi', compact('fakultas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fakultas_id' => 'required|exists:fakultas,id',
            'nama_prodi' => 'required|min:3',
            'nama_kaprodi' => 'required|min:3',
            'photo_kaprodi' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:1024'
        ]);

        $data = $request->only(['fakultas_id', 'nama_prodi', 'nama_kaprodi']);

        if ($request->hasFile('photo_kaprodi')) {
            $data['photo_kaprodi'] = $request->file('photo_kaprodi')->store('photos/kaprodi', 'public');
        } else {
            $data['photo_kaprodi'] = '';
        }

        Prodi::create($data);

        return redirect('/prodi')->with('success', 'Data prodi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        $prodi->load('fakultas');
        return view('prodi.detail-prodi', compact('prodi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        $fakultas = Fakultas::all();
        return view('prodi.edit-prodi', compact('prodi', 'fakultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi)
    {
        $request->validate([
            'fakultas_id' => 'required|exists:fakultas,id',
            'nama_prodi' => 'required|min:3',
            'nama_kaprodi' => 'required|min:3',
            'photo_kaprodi' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:1024'
        ]);

        $data = $request->only(['fakultas_id', 'nama_prodi', 'nama_kaprodi']);

        if ($request->hasFile('photo_kaprodi')) {
            $data['photo_kaprodi'] = $request->file('photo_kaprodi')->store('photos/kaprodi', 'public');
        }

        $prodi->update($data);

        return redirect('/prodi')->with('success', 'Data prodi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi)
    {
        $prodi->delete();
        return redirect()->back()->with('success', 'Data prodi berhasil dihapus!');
    }
}
