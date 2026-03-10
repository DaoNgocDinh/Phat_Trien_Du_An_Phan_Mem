<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lienhe extends Model
{
    use HasFactory;

    protected $table = 'lienhe';
    protected $primaryKey = 'MaLienHe';
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'MaLienHe',
        'HoTen',
        'Email',
        'ChuDe',
        'NoiDung',
        'ThoiGianGui',
    ];
}

