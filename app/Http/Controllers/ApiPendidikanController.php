<?php

namespace App\Http\Controllers;
use App\Models\Pendidikan;
use Illuminate\Http\Request,
App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class ApiPendidikanController extends Controller
{
    public function getAll()
    {
        return response()->json(Pendidikan::all(), 200);
    }

    public function getPen($id)
    {
        $pendidikan = Pendidikan::find($id);
        if (!$pendidikan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        return response()->json($pendidikan, 200);
    }

    public function createPen(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tingkatan' => 'required|integer',
            'tahun_masuk' => 'required|integer',
            'tahun_keluar' => 'nullable|integer'
        ]);

        $pendidikan = Pendidikan::create($request->all());
        return response()->json(['status' => 'ok', 'message' => 'Pendidikan berhasil ditambahkan!'], 201);
    }

    public function updatePen(Request $request, $id)
    {
        $pendidikan = Pendidikan::find($id);
        if (!$pendidikan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $request->validate([
            'nama' => 'sometimes|string|max:255',
            'tingkatan' => 'sometimes|integer',
            'tahun_masuk' => 'sometimes|integer',
            'tahun_keluar' => 'sometimes|integer'
        ]);

        $pendidikan->update($request->all());
        return response()->json(['status' => 'ok', 'message' => 'Pendidikan berhasil diperbarui!'], 200);
    }

    public function deletePen($id)
    {
        $pendidikan = Pendidikan::find($id);
        if (!$pendidikan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        $pendidikan->delete();
        return response()->json(['message' => 'Pendidikan berhasil dihapus'], 200);
    }
}
