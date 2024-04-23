<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('articles')->insert([
            'title' => Str::random(10),
            'body' => Str::random(50),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
