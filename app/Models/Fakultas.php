<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    protected $fillable = [
        'name',
        'dekan',
    ];

    /**
     * Relasi: Fakultas memiliki banyak Prodi
     */
    public function prodi()
    {
        return $this->hasMany(Prodi::class);
    }
}
