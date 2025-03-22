<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'properties'; // Nom de la table
    protected $fillable = ['name', 'description', 'price_per_night']; // Colonnes modifiables
}
