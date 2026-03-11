<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiendodetai extends Model
{
    use HasFactory;

    protected $table = 'tiendodetai';
    protected $primaryKey = 'MaTienDo';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'MaTienDo',
        'MaDeTai',
        'TenDeTai',
        'TrangThai',
        'ThoiGianCapNhat',
        'FileBaoCao',
        'NoiDungBaoCao',
        'KetQua',
        'KhoKhan',
        'TienDoHienTai',
        'PhanTramTienDo',
    ];

    public function detai()
    {
        return $this->belongsTo(Detai::class, 'MaDeTai', 'MaSo');
    }
}

