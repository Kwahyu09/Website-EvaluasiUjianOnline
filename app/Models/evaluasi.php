<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evaluasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function ujian()
    {
        return $this->belongsTo(ujian::class);
    }

    public function mahasiswa()
    {
        return $this->belongsToMany(mahasiswa::class);
    }

    public function soal()
    {
        return $this->belongsTo(soal::class);
    }
}
