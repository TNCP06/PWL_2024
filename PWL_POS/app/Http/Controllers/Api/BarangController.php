<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BarangModel;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        return BarangModel::all();
    }

    public function store(Request $request)
    {
        $barang = BarangModel::create($request->all());
        return response()->json($barang, 201);
    }

    public function show($id)
    {
        $barang = BarangModel::find($id);
        if (!$barang) {
            return response()->json(['message' => 'Barang not found'], 404);
        }
        return response()->json($barang, 200);
    }

    public function update(Request $request, $id)
    {
        $barang = BarangModel::find($id);
        if (!$barang) {
            return response()->json(['message' => 'Barang not found'], 404);
        }
        $barang->update($request->all());
        return response()->json($barang, 200);
    }

    public function destroy($id)
    {
        $barang = BarangModel::find($id);
        if (!$barang) {
            return response()->json(['message' => 'Barang not found'], 404);
        }
        $barang->delete();
        return response()->json(null, 204);
    }
}
