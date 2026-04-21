<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paspor extends Model
{
    use HasFactory;

    protected $table = 'paspors';

    // Mendefinisikan kolom yang boleh diisi (mass assignable)
    protected $fillable = [
        'nama_pemohon',
        'nik',
        'jenis_paspor',
    ];
}