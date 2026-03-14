<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detai extends Model
{
    use HasFactory;

    protected $table = 'detai';
    protected $primaryKey = 'MaSo';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'MaSo',
        'TenDeTai',
        'ChuNhiem',
        'DonVi',
        'CapDeTai',
        'LoaiDeTai',
        'ThoiGianBatDau',
        'ThoiGianKetThuc',
        'TrangThai',
        'MucTieu',
        'NoiDungChinh',
        'ThanhVien',
        'KetQua',
        'FileSanPham',
        'KinhPhi',
    ];

    public function tiendodetai()
    {
        return $this->hasMany(Tiendodetai::class, 'MaDeTai', 'MaSo');
    }
}

