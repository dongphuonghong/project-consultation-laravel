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
        Schema::create('cau_hoi_luat_chois', function (Blueprint $table) {
            $table->id();
            $table-> bigint('luot_choi_id')->unsigned();
            $table>foreign('luot_choi_id')->references('id')->on('luot_chois')                ->onDelete('cascade')->onUpdate('cascade');
            $table-> foreign('cau_hoi_id')                ->references('id')->on('cau_hois')->onDelete('cascade')                ->onUpdate('cascade');


            $table-> text('phuong_an');
            $table-> in ('diem');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cau_hoi_luat_chois');
    }
};
