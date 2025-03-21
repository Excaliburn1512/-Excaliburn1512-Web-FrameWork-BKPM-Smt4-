<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Pendidikan;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    public function index()
    {
        $pendidikan = Pendidikan::all();
        return view('backend.pendidikan.index', compact('pendidikan'));
    }

    public function create()
    {
        return view('backend.pendidikan.create');
    }


    public function store(Request $request)
    {
        Pendidikan::create($request->only(['nama', 'tingkatan', 'tahun_masuk', 'tahun_keluar']));

        return redirect()->route('pendidikan.index')->with('success', 'Data pendidikan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        return view('backend.pendidikan.edit', compact('pendidikan'));
    }

    public function update(Request $request, $id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->update($request->only(['nama', 'tingkatan', 'tahun_masuk', 'tahun_keluar']));

        return redirect()->route('pendidikan.index')->with('success', 'Data pendidikan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Pendidikan::findOrFail($id)->delete();
        return redirect()->route('pendidikan.index')->with('success', 'Data pendidikan berhasil dihapus!');
    }
}