<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    protected $table = 'tin_tucs';
    protected $fillable = ['tieude', 'tomtat', 'noidung', 'hinhanh', 'ngaydang'];
    public function danhMuc() {
        return $this->belongsTo(DanhMuc::class, 'danh_muc_id');
    }
}

