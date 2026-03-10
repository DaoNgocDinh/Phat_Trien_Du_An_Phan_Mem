<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nghiencuusinh extends Model
{
    use HasFactory;

    protected $table = 'nghiencuusinh';
    protected $primaryKey = 'MaSinhVien';
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'MaSinhVien',
        'UserID',
        'HoTen',
        'Khoa',
        'Lop',
        'NgaySinh',
    ];

    public function taikhoan()
    {
        return $this->belongsTo(Taikhoan::class, 'UserID', 'UserID');
    }
}

