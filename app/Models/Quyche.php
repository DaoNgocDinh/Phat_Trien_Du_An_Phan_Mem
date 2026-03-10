<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quyche extends Model
{
    use HasFactory;

    protected $table = 'quyche';
    protected $primaryKey = 'MaQuyChe';
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'MaQuyChe',
        'TenVanBan',
        'SoHieu',
        'NgayBanHanh',
        'LoaiVanBan',
        'FilePDF',
    ];
}

