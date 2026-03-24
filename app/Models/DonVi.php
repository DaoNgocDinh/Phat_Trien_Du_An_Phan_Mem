<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonVi extends Model
{
    use HasFactory;

    // tên bảng (Laravel tự đoán cũng được nhưng nên ghi rõ)
    protected $table = 'don_vis';

    // các cột cho phép insert/update
    protected $fillable = [
        'ten_don_vi'
    ];

    // quan hệ: 1 đơn vị có nhiều đề tài
    public function detais()
    {
        return $this->hasMany(\App\Models\Detai::class, 'donvi_id');
    }
}