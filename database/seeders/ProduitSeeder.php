<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Seeder;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* $produit= Produit::create([
            "designation" =>'Telephone iphone 12',
            "prix"=> 250000,
            "quantite"=> 3,
            "description"=>"bon telephone",
        ]); */
        Produit::factory(10)->create();
    }
     // \App\Models\User::factory(10)->create();
}
