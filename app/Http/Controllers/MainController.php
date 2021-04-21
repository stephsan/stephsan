<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function accueil()
    {
        return view('welcome');
    }
}
