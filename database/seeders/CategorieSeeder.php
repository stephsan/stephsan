<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categorie::create([
            "libelle"=>'Materiels Electroniques',
            "description"=>'ceci est la description des mat electroniques'
        ]);
        Categorie::create([
            "libelle"=>'Vetement',
            "description"=>'ceci est la description de la categorie vetement'
        ]);

    }
}
