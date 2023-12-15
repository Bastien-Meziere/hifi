<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produits;
use App\Models\Fabricants;
use App\Models\Categories;

class AjoutProduitController extends Controller
{
    public function formulaire()
    {
        $fabricants = Fabricants::all();
        $categories = Categories::all();
        return view('ajouterProduit', compact('fabricants', 'categories'));
    }

    public function ajouter(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'modele' => 'required|string|max:255',
            'marque' => 'required|string|max:255',
            'description' => 'required|string',
            'prixUsine' => 'required|numeric|min:0',
            'prixVenteConseille' => 'required|numeric|min:0',
            'id_fabricant' => 'required|exists:fabricants,id',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
        ]);

        // Création d'un nouveau produit avec les données du formulaire
        $nouveauProduit = Produits::create([
            'modèle' => $request->modele,
            'marque' => $request->marque,
            'description' => $request->description,
            'prixUsine' => $request->prixUsine,
            'prixVenteConseillé' => $request->prixVenteConseille,
            'id_fabricant' => $request->id_fabricant,
        ]);

        $nouveauProduit->categories()->attach($request->input('categories'));

        // Redirection avec un message de succès
        return redirect('/')->with('success', 'Produit ajouté avec succès !');
    }
}
