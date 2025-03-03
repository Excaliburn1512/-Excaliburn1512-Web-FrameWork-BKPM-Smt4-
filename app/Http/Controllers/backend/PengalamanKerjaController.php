<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PengalamanKerjaController extends Controller
{
    public function index()
    {
        // Ambil semua data pengalaman kerja
        $pengalaman_kerja = DB::table('pengalaman_kerja')->get();

        // Kirim data ke view
        return view('backend.pengalaman_kerja.index', compact('pengalaman_kerja'));
    }

    public function create()
    {
        $pengalaman_kerja = null;
        return view('backend.pengalaman_kerja.create', compact('pengalaman_kerja'));
    }

    public function store(Request $request)
    {
        DB::table('pengalaman_kerja')->insert([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar
        ]);

        return redirect()->route('pengalaman_kerja.index')
            ->with('success', 'Data pengalaman kerja baru telah berhasil disimpan.');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pengalaman_kerja = DB::table('pengalaman_kerja')->where('id', $id)->first();
        return view('backend.pengalaman_kerja.edit', compact('pengalaman_kerja'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        DB::table('pengalaman_kerja')->where('id', $id)->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar
        ]);

        return redirect()->route('pengalaman_kerja.index')->with('success', 'Data pengalaman kerja berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('pengalaman_kerja')->where('id', $id)->delete();
        return redirect()->route('pengalaman_kerja.index')->with('success', 'Data pengalaman kerja berhasil dihapus.');
    }
}
