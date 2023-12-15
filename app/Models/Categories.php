<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories'; // Table du modèle
    protected $primaryKey = 'id'; // Clé primaire
    protected $connexion = 'mysql'; //Connexion à utiliser
    public $timestamps = false;
}
