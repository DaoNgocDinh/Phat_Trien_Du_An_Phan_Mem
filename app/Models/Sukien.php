<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sukien extends Model
{
    use HasFactory;

    protected $table = 'sukien';
    protected $primaryKey = 'MaSuKien';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'MaSuKien',
        'TenSuKien',
        'MoTa',
        'DiaDiem',
        'ThoiGian',
        'HinhThuc',
        'SoLuongToiDa',
    ];

    public function dangkysukien()
    {
        return $this->hasMany(Dangkysukien::class, 'MaSuKien', 'MaSuKien');
    }
}

