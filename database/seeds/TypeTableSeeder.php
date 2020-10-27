<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type')->insert([
            'type_name' => "Day",
        ]);
        DB::table('type')->insert([
            'type_name' => "Weekend",
        ]);
        DB::table('type')->insert([
            'type_name' => "Week",
        ]);

    }
}