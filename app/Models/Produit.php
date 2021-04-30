<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    public $fillable = ['designation', 'prix', 'description', 'quantite', 'image', 'categorie_id'];

    use HasFactory;
    public function categorie(){
        return $this->belongsTo(Produit::class);
    }
    public function users(){
        return $this->BelongsToMany(User::class);
    }
}
