<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TinTuc extends Model {
  use SoftDeletes;
  protected $fillable=['tieude','tomtat','noidung','hinhanh','ngaydang','danh_muc_id'];
  public function danhMuc(){ return $this->belongsTo(DanhMuc::class,'danh_muc_id'); }
}

