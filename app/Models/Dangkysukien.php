<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dangkysukien extends Model
{
    use HasFactory;

    protected $table = 'dangkysukien';
    protected $primaryKey = 'MaDangky';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'MaDangky',
        'MaSuKien',
        'UserID',
        'SoLuongDangKy',
        'ThoiGianDangKy',
    ];

    public function sukien()
    {
        return $this->belongsTo(Sukien::class, 'MaSuKien', 'MaSuKien');
    }

    public function taikhoan()
    {
        return $this->belongsTo(Taikhoan::class, 'UserID', 'UserID');
    }
}

