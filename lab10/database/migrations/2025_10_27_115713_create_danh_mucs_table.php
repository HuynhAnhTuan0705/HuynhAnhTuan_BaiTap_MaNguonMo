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
    public function up(): void
{
    Schema::create('danh_mucs', function (Blueprint $table) {
        $table->id();
        $table->string('ten', 120);
        $table->string('slug', 140)->unique();
        $table->timestamps();
    });

    // thêm cột khóa ngoại cho tin_tucs
    Schema::table('tin_tucs', function (Blueprint $table) {
        $table->foreignId('danh_muc_id')->nullable()->constrained('danh_mucs')->nullOnDelete();
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('danh_mucs');
    }
};
