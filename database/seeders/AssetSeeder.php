<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assets')->insert(
            [
                'asset_type_id' => '1',
                'name' => 'Toyota Yaris 1.3 Manual',
                'status'=> '1',
                'created_at' => Carbon::create('2022', '12', '01'),
                'updated_at' => Carbon::create('2022', '12', '01'),
            ]
        );
    }
}
