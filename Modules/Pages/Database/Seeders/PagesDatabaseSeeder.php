<?php

namespace Modules\Pages\Database\Seeders;

use Illuminate\Database\Seeder;

class PagesDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PagesTableSeeder::class);
    }
}