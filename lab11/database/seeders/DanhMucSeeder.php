<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DanhMuc; use Illuminate\Support\Str;
class DanhMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void {
  foreach (['Công nghệ','Lập trình','CSDL','Công cụ','Tin tức'] as $n) {
    DanhMuc::updateOrCreate(['slug'=>Str::slug($n)], ['ten'=>$n]);
  }
}
}
