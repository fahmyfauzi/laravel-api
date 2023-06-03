<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    // inisialisasi table buku bukan bukus
    protected $table = 'buku';

    //mass asignment , memberitahukan bahwa tabel hanya boleh menerima inputan judul,pengarang dan tanggal publikasi
    protected $fillable = [
        'judul', 'pengarang', 'tanggal_publikasi'
    ];
}
