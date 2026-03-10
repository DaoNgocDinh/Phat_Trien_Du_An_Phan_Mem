<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canbokhoahoc extends Model
{
    use HasFactory;

    protected $table = 'canbokhoahoc';
    protected $primaryKey = 'MaCanBo_admin';
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'MaCanBo_admin',
        'UserID',
        'PhongBan',
        'ChucVu',
        'HocVi',
        'TrangThai',
    ];

    public function taikhoan()
    {
        return $this->belongsTo(Taikhoan::class, 'UserID', 'UserID');
    }
}

