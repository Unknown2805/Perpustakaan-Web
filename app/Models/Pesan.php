<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;
    protected $table = 'pesans';
    protected $fillable = [
        'pengirim_id',
        'penerima_id',
        'judul_pesan',
        'isi_pesan',
        'status',
        'tgl_kirim',
    ];
    public function pengirim(){
        return $this->belongsTo(User::class,'pengirim_id');
    }
    public function penerima(){
        return $this->belongsTo(User::class,'penerima_id');
    }
}
