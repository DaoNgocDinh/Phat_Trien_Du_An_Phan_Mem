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
        'MaChucVu',
        'MaKhoa',
        'Email',
        'Sdt',
        'AnhDaiDien',
        'CV',
        'NgaySinh',
    ];

    public function taikhoan()
    {
        return $this->belongsTo(Taikhoan::class, 'UserID', 'UserID');
    }

    public function khoa()
    {
        return $this->belongsTo(Khoa::class, 'MaKhoa', 'MaKhoa');
    }

    public function chucvu()
    {
        return $this->belongsTo(ChucVu::class, 'MaChucVu', 'MaChucVu');
    }
}

