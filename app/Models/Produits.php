<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produits extends Model
{
    protected $table = 'produits'; // Table du modèle
    protected $primaryKey = 'id'; // Clé primaire
    protected $connexion = 'mysql'; //Connexion à utiliser
    public $timestamps = false;
    protected $fillable = [
        'modèle',
        'marque',
        'description',
        'prixUsine',
        'prixVenteConseillé',
        'id_fabricant',
        'id_categorie',
    ];

    // Relation avec la table appartenir pour les catégories
    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'appartenir', 'id_produit', 'id_categorie');
    }

    // Relation avec la table fabricants
    public function fabricants()
    {
        return $this->belongsTo(Fabricants::class, 'id_fabricant');
    }

    // Relation avec la table categories
    public function categorie()
    {
        return $this->belongsTo(Categories::class, 'id_categorie');
    }
}


