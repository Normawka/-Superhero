<?php

namespace Database\Seeders;

use App\Models\Superhero;
use App\Models\SuperheroImage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Superhero::factory(1)->create();
        SuperheroImage::factory(1)->create();
    }
}
