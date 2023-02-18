<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ??  false, function($query, $search){
            return $query->where('kd_ujian', 'like', '%' . $search . '%')
                  ->orWhere('nama_ujian', 'like', '%' . $search . '%')
                  ->orWhere('tanggal', 'like', '%' . $search . '%')
                  ->orWhere('waktu_mulai', 'like', '%' . $search . '%')
                  ->orWhere('waktu_selesai', 'like', '%' . $search . '%');
        });
    }

    public function ketuasekretaris()
    {
        return $this->belongsTo(ketuasekretaris::class);
    }

    public function modul()
    {
        return $this->belongsTo(modul::class);
    }

    public function kelas()
    {
        return $this->belongsTo(kelas::class);
    }

    public function evaluasi()
    {
        return $this->hasOne(evaluasi::class);
    }
}

