<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    use HasFactory;

    protected $table = 'chucvu';
    protected $primaryKey = 'MaChucVu';

    protected $fillable = [
        'TenChucVu',
        'MoTa',
    ];

    public function giangviens()
    {
        return $this->hasMany(Giangvien::class, 'MaChucVu', 'MaChucVu');
    }
    public function chucVu()
    {
        return $this->belongsTo(ChucVu::class, 'MaChucVu');
    }

    public function khoa()
    {
        return $this->belongsTo(Khoa::class, 'MaKhoa');
    }
}
