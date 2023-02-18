<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ??  false, function($query, $search){
            return $query->where('nama_kelas', 'like', '%' . $search . '%')
                  ->orWhere('tahun_ajaran', 'like', '%' . $search . '%')
                  ->orWhere('jurusan', 'like', '%' . $search . '%');
        });
    }

    public function mahasiswa()
    {
        return $this->hasMany(mahasiswa::class);
    }

    public function ujian()
    {
        return $this->hasMany(ujian::class);
    }
}
