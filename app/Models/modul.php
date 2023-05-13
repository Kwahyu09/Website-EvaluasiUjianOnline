<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ??  false, function($query, $search){
            return $query->where('kd_modul', 'like', '%' . $search . '%')
                  ->orWhere('nama_modul', 'like', '%' . $search . '%')
                  ->orWhere('semester', 'like', '%' . $search . '%')
                  ->orWhere('sks', 'like', '%' . $search . '%');
        });
    }

    public function ketuasekretaris()
    {
        return $this->belongsTo(ketuasekretaris::class);
    }

    public function grup_soal()
    {
        return $this->hasMany(grup_soal::class);
    }

    public function ujian()
    {
        return $this->hasMany(ujian::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
