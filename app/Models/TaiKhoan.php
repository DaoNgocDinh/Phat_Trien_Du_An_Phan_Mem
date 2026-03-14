<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
class TaiKhoan extends Model
{
    use HasApiTokens;

    protected $table = 'TAIKHOAN';

    protected $primaryKey = 'UserID';

    public $timestamps = false;

    protected $fillable = [
        'UserID',
        'MatKhau',
        'VaiTro'
    ];
}
