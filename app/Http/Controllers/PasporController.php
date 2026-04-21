<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePasporRequest;
use App\Services\PasporService;
use App\Models\Paspor;
use Illuminate\Http\Request;
use Exception;

class PasporController extends Controller
{
    protected $pasporService;

    // Dependency Injection untuk Service
    public function __construct(PasporService $pasporService)
    {
        $this->pasporService = $pasporService;
    }

    // 1. FUNGSI TAMPILKAN DATA
    public function index()
    {
        $data = Paspor::all();
        return response()->json([
            'message' => 'Data berhasil dimuat',
            'data' => $data
        ], 200);
    }

    // 2. FUNGSI TAMBAH DATA (Include: Validasi, Error Handling, Refactor Service)
    public function store(StorePasporRequest $request)
    {
        try {
            // Validasi otomatis ditangani oleh StorePasporRequest.
            // Jika lolos, ambil data yang sudah tervalidasi:
            $validatedData = $request->validated();

            // Memanggil Service untuk proses penyimpanan data
            $paspor = $this->pasporService->createData($validatedData);

            return response()->json([
                'message' => 'Data permohonan berhasil ditambahkan',
                'data' => $paspor
            ], 201);

        } catch (Exception $e) {
            // Error Handling
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // 3. FUNGSI UBAH DATA
    public function update(Request $request, $id)
    {
        $paspor = Paspor::find($id);

        if (!$paspor) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $paspor->update($request->all());

        return response()->json([
            'message' => 'Data berhasil diubah',
            'data' => $paspor
        ], 200);
    }

    // 4. FUNGSI HAPUS DATA
    public function destroy($id)
    {
        $paspor = Paspor::find($id);

        if (!$paspor) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $paspor->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus'
        ], 200);
    }
}