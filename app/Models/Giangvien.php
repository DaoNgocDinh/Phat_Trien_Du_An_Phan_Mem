<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giangvien extends Model
{
    use HasFactory;

    protected $table = 'giangvien';
    protected $primaryKey = 'MaGiangVien';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'MaGiangVien',
        'UserID',
        'HoTen',
        'ChucVu',
        'Khoa',
        'Email',
        'Sdt',
        'AnhDaiDien',
        'CV',
    ];

    public function taikhoan()
    {
        return $this->belongsTo(Taikhoan::class, 'UserID', 'UserID');
    }
}

