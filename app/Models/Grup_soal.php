<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grup_soal extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ??  false, function($query, $search){
            return $query->where('nama_grup', 'like', '%' . $search . '%');
        });

        // $query->when($filters['modul'] ?? false, fn($query, $modul) =>
        //     $query->whereHas('modul', fn($query) =>
        //         $query->where('nama_modul', $modul)
        //     )
        // );

    }

    public function modul()
    {
        return $this->belongsTo(modul::class);
    }

    public function soal()
    {
        return $this->hasMany(soal::class);
    }
}
