<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produits;
use App\Models\Fabricants;
use App\Models\Categories;


class AccueilController extends Controller
{
    // Pour le lien "Afficher le catalogue des produits"
    public function index()
    {
        $produits = Produits::with('categories', 'fabricants')->get();
        $fabricants = Fabricants::all();

        return view('produit', compact('produits', 'fabricants'));
    }

    // Pour le lien "Afficher les produits en fonction du fabricant"
    public function produitsParFabricant($fabricantId = null)
    {
        $fabricants = Fabricants::all();
        $selectedFabricant = $fabricantId ? Fabricants::find($fabricantId) : null;

        $produits = $selectedFabricant
        ? Produits::with('categories', 'fabricants')
            ->where('id_fabricant', $fabricantId)
            ->get()
        : collect();

        return view('produitFabri', compact('produits', 'fabricants', 'selectedFabricant'));
    }

    // Pour le lien "Afficher les produits en fonction du fabricant"
    public function produitsParCategorie(Request $request)
    {
        $categories = Categories::all();
        $selectedCategories = $request->input('categories', []);
    
        $produits = $selectedCategories
            ? Produits::with('categorie', 'fabricants')
            ->whereHas('categories', function ($query) use ($selectedCategories) {
                $query->whereIn('id_categorie', $selectedCategories);
            })
            ->get()
        : collect();

        return view('produitCate', compact('produits', 'categories', 'selectedCategories'));
    }
}
