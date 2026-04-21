<?php

namespace App\Services;

use App\Models\Paspor;
use Illuminate\Support\Facades\Log;
use Exception;

class PasporService
{
    /**
     * Menangani logika penambahan data ke database
     */
    public function createData(array $validatedData)
    {
        try {
            // Logika bisnis tambahan bisa diletakkan di sini jika diperlukan
            $paspor = Paspor::create($validatedData);
            return $paspor;
            
        } catch (Exception $e) {
            // Mencatat error ke log system Laravel
            Log::error('Gagal menyimpan data paspor: ' . $e->getMessage());
            
            // Melempar kembali exception agar ditangkap oleh Controller
            throw new Exception("Terjadi kesalahan sistem saat menyimpan data.");
        }
    }
}
