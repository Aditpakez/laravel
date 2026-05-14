<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prodi extends Model
{
    use SoftDeletes;

    protected $table = 'prodi';

    protected $fillable = [
        'fakultas_id',
        'nama_prodi',
        'nama_kaprodi',
        'photo_kaprodi'
    ];

    /**
     * Relasi: Prodi milik satu Fakultas
     */
    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }
}
