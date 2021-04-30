<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\User;

class MainController extends Controller
{
    public function accueil()
    {
        $users = User::orderByDesc('id')->first();

       // dd($users->isAdmin());

        $produits= Produit::orderByDesc('id')->take(9)->get();
        return view('welcome', compact('produits'));
    }
}
