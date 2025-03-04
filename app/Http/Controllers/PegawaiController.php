<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        return $request->segment(2);
    }
    public function formulir()
    {
        return view('formulir');
    }
    public function proses(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:5|max:20',
            'alamat' => 'required|alpha'
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.min' => 'Nama harus minimal 5 karakter.',
            'nama.max' => 'Nama harus maksimal 20 karakter.',
            'alamat.required' => 'Alamat wajib diisi.'
        ]);

        $nama = $request->input('nama');
        $alamat = $request->input('alamat');

        return "Nama: " . $nama . ", Alamat: " . $alamat;
    }
}
