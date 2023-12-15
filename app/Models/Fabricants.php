<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabricants extends Model
{
    protected $table = 'fabricants'; // Table du modèle
    protected $primaryKey = 'id'; // Clé primaire
    protected $connexion = 'mysql'; //Connexion à utiliser
    public $timestamps = false;
}
