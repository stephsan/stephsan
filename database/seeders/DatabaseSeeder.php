<?php

namespace Database\Seeders;

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
       ProduitSeeder::class;
       RoleSeeder::class;

        \App\Models\User::factory(2)->create();
    }
}
