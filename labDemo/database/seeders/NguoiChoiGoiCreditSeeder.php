<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NguoiChoiGoiCreditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('nguoi_choi_goi_credit')->delete();
        \App\Models\nguoi_choi_goi_credit::factory()->create();
    }
}
