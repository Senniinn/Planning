<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'type_name' => "Day",
        ]);
        DB::table('types')->insert([
            'type_name' => "Weekend",
        ]);
        DB::table('types')->insert([
            'type_name' => "Week",
        ]);

    }
}
