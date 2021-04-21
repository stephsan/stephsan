<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    public $fillable = ['designation', 'prix', 'description', 'quantite'];

    use HasFactory;
}
