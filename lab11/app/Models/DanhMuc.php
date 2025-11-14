<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model {
  protected $fillable=['ten','slug'];
  public function tinTucs(){ return $this->hasMany(TinTuc::class,'danh_muc_id'); }
}

