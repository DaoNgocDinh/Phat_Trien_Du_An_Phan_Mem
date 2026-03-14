<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taikhoan extends Model
{
    use HasFactory;

    protected $table = 'taikhoan';
    protected $primaryKey = 'UserID';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'UserID',
        'MatKhau',
        'VaiTro',
    ];

    public function giangvien()
    {
        return $this->hasOne(Giangvien::class, 'UserID', 'UserID');
    }

    public function nghiencuusinh()
    {
        return $this->hasOne(Nghiencuusinh::class, 'UserID', 'UserID');
    }

    public function canbokhoahoc()
    {
        return $this->hasOne(Canbokhoahoc::class, 'UserID', 'UserID');
    }

    public function dangkysukien()
    {
        return $this->hasMany(Dangkysukien::class, 'UserID', 'UserID');
    }
}

