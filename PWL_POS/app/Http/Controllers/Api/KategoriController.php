<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KategoriModel;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        return KategoriModel::all();
    }

    public function store(Request $request)
    {
        $kategori = KategoriModel::create($request->all());
        return response()->json($kategori, 201);
    }

    public function show($id)
    {
        $kategori = KategoriModel::find($id);
        if (!$kategori) {
            return response()->json(['message' => 'Kategori not found'], 404);
        }
        return response()->json($kategori, 200);
    }

    public function update(Request $request, $id)
    {
        $kategori = KategoriModel::find($id);
        if (!$kategori) {
            return response()->json(['message' => 'Kategori not found'], 404);
        }
        $kategori->update($request->all());
        return response()->json($kategori, 200);
    }

    public function destroy($id)
    {
        $kategori = KategoriModel::find($id);
        if (!$kategori) {
            return response()->json(['message' => 'Kategori not found'], 404);
        }
        $kategori->delete();
        return response()->json(null, 204);
    }
}
