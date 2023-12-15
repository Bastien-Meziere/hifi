<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AjoutProduitController;

// Route pour la page d'accueil
Route::get('/', function () {return view('accueil');});
// Route pour la page de catalogue des produits
Route::get('/produit', [AccueilController::class, 'index']);
// Route pour afficher la page de la liste des fabricants
Route::get('/produitsFabs', [AccueilController::class, 'produitsParFabricant']);
// Route pour la page des produits quand on clique sur un fabricant spécifique
Route::get('/produitsFabs/{fabricant?}', [AccueilController::class, 'produitsParFabricant'])->name('produit.fabricant');
// Route pour la page de la liste des catégories
Route::get('/produitsCats', [AccueilController::class, 'produitsParCategorie']);
// Route pour la page des produits par catégorie quand on coche une ou plusieurs catégories
Route::get('/produitsCats/{categorie?}', [AccueilController::class, 'produitsParCategorie'])->name('produit.categorie');
// Route pour afficher le formulaire d'ajout de produit
Route::get('/ajouterProduit', [AjoutProduitController::class, 'formulaire'])->name('ajouterProduit');
// Route pour traiter l'ajout d'un produit (méthode post du formulaire)
Route::post('/ajouterProduit', [AjoutProduitController::class, 'ajouter']);