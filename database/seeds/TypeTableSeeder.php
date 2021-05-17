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
        DB::table('types')->insert([
            'name' => 'select'
        ]);
        DB::table('types')->insert([
            'name' => 'checkbox',
        ]);
        DB::table('types')->insert([
            'name' => 'radio',
        ]);

        DB::table('types')->insert([
            'name' => 'text',
        ]);
        DB::table('types')->insert([
            'name' => 'textarea',
        ]);
        DB::table('types')->insert([
            'name' => 'email',
        ]);
        DB::table('types')->insert([
            'name' => 'number',
        ]);

        DB::table('types')->insert([
            'name' => 'date',
        ]);
        DB::table('types')->insert([
            'name' => 'time',
        ]);
        DB::table('types')->insert([
            'name' => 'datetime',
        ]);
    }
}
