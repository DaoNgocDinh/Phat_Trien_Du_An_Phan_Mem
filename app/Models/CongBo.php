<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CongBo extends Model
{
    use HasFactory;

    protected $table = 'congbo';
    protected $primaryKey = 'MaCongBo';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'MaCongBo',
        'TenCongBo',
        'TacGia',
        'NamXuatBan',
        'NoiCongBo',
        'LoaiCongBo',
        'DOI',
        'FilePDF',
        'NoiDungTomTat',
    ];
}
