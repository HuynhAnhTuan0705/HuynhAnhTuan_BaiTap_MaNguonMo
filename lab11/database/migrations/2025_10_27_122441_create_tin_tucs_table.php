<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tin_tucs', function (Blueprint $t) {
  $t->id();
  $t->string('tieude',200);
  $t->string('tomtat',300)->nullable();
  $t->text('noidung');
  $t->string('hinhanh',100)->nullable();
  $t->dateTime('ngaydang')->useCurrent();
  $t->foreignId('danh_muc_id')->nullable()->constrained('danh_mucs')->nullOnDelete();
  $t->softDeletes(); // để có khôi phục/force delete
  $t->timestamps();
});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tin_tucs');
    }
};
