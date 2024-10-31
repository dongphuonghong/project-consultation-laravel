<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CauHoiLuatChoiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cau_hoi_luotchoi')->delete();
        \App\Models\cau_hoi_luot_choi::factory()->create();
    }
}
