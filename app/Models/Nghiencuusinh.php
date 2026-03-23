<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nghiencuusinh extends Model
{
    use HasFactory;

    protected $table = 'nghiencuusinh';
    protected $primaryKey = 'MaSinhVien';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'MaSinhVien',
        'UserID',
        'HoTen',
        'MaKhoa',
        'Lop',
        'NgaySinh',
        'Email',
    ];

    public function taikhoan()
    {
        return $this->belongsTo(Taikhoan::class, 'UserID', 'UserID');
    }

    public function khoa()
    {
        return $this->belongsTo(Khoa::class, 'MaKhoa', 'MaKhoa');
    }
}

