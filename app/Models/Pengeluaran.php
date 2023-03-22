<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    // nama tabel dibuat custom pakai bahasa Indonesia
    protected $table = 'pengeluaran';

    protected $fillable = [
        'jumlah', 'keterangan'
    ];
}
