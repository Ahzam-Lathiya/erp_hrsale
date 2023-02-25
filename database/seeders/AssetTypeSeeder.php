<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('asset_types')->insert(
            [
                'sdesc' => 'Vehicle',
                'ldesc' => 'Vehicle',
                'status'=> '1',
                'created_at' => Carbon::create('2022', '12', '01'),
                'updated_at' => Carbon::create('2022', '12', '01'),
            ]
        );

        $this->call([
            AssetSeeder::class,
        ]);
    }
}
