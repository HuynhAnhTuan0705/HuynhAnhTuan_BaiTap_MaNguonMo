<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\DanhMuc;
use App\Models\TinTuc;

class DanhMucSeeder extends Seeder
{
    public function run(): void
    {
        $names = ['Công nghệ','Lập trình','CSDL','Công cụ','Tin tức'];

        // Tạo/cập nhật theo slug để không bị trùng khi chạy lại
        foreach ($names as $n) {
            DanhMuc::updateOrCreate(
                ['slug' => Str::slug($n)],
                ['ten'  => $n]
            );
        }

        // Gán danh mục ngẫu nhiên CHỈ cho bài chưa có danh_muc_id
        $ids = DanhMuc::pluck('id')->all();
        if (!empty($ids)) {
            TinTuc::whereNull('danh_muc_id')->get()->each(function ($t) use ($ids) {
                $t->danh_muc_id = $ids[array_rand($ids)];
                $t->save();
            });
        }
    }
}
