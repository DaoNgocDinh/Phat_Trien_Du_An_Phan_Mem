<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thongbao extends Model
{
    use HasFactory;

    protected $table = 'thongbao';
    protected $primaryKey = 'MaThongBao';
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'MaThongBao',
        'TieuDe',
        'NoiDung',
        'LoaiThongBao',
        'NgayTao',
    ];
}

