<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khoa extends Model
{
    use HasFactory;

    protected $table = 'khoa';
    protected $primaryKey = 'MaKhoa';

    protected $fillable = [
        'TenKhoa',
        'MoTa',
    ];

    public function giangviens()
    {
        return $this->hasMany(Giangvien::class, 'MaKhoa', 'MaKhoa');
    }

    public function nghiencuusinhs()
    {
        return $this->hasMany(Nghiencuusinh::class, 'MaKhoa', 'MaKhoa');
    }
}
