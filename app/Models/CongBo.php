<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CongBo extends Model
{
    protected $table = 'congbo';

    protected $primaryKey = 'MaCongBo';

    protected $fillable = [
        'TenCongBo',
        'TacGia',
        'NamXuatBan',
        'NoiCongBo',
        'LoaiCongBo',
        'DOI',
        'FilePDF',
        'NoiDungTomTat',
        'TrangThai'
    ];
}
