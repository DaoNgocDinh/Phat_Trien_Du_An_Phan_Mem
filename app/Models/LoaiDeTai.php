<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoaiDeTai extends Model
{
    protected $table = 'loai_de_tais';
    protected $fillable = ['ten_loai'];
    public function detais()
    {
        return $this->hasMany(Detai::class, 'loai_id');
    }
}
