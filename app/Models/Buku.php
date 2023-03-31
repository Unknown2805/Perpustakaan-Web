<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'bukus';
    protected $fillable = [
        'gambar',
        'kategori_id',
        'penerbit_id',
        'judul',
        'pengarang',
        'tahun_terbit',
        'isbn',
        'j_buku_baik',
        'j_buku_rusak',
    ];
    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }
    public function penerbit(){
        return $this->belongsTo(Penerbit::class);
    }
    public function peminjamans(){
        return $this->hasMany(Peminjaman::class);
    }
}
