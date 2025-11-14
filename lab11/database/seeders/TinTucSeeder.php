<?php

namespace Database\Seeders;
use App\Models\TinTuc; use App\Models\DanhMuc;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TinTucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void {
  $ids = DanhMuc::pluck('id')->all(); if(!$ids) return;
  $rows = [
    ['tieude'=>'Laravel 11 ra mắt','tomtat'=>'Nhiều cải tiến','noidung'=>'...', 'hinhanh'=>'1.jpg'],
    ['tieude'=>'PHP 8.3','tomtat'=>'Tính năng mới','noidung'=>'...', 'hinhanh'=>'2.jpg'],
    ['tieude'=>'MySQL 9.0','tomtat'=>'Tối ưu query','noidung'=>'...', 'hinhanh'=>'3.jpg'],
  ];
  foreach($rows as $r){ $r['danh_muc_id']=$ids[array_rand($ids)]; TinTuc::updateOrCreate(['tieude'=>$r['tieude']],$r); }
}
}
