<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ves = [];
        
        DB::table('ves')->truncate();
        DB::table('ves')->delete();
        DB::table('ves')->insert($ves);
    }
}
