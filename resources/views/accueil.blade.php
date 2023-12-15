<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/app.css') }}">
    <title>Accueil - Boutique</title>
</head>
<body>
<header>
    <h1>Boutique HI-FI</h1>
</header>
<main>
    <!-- Session pour pouvoir afficher le message de succès lors de l'ajout d'un produit -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="lien-accueil">
        <a href="{{ url('/produit') }}">Afficher le catalogue des produits</a><br>
        <a href="{{ url('/produitsFabs') }}">Afficher les produits en fonction du fabricant</a><br>
        <a href="{{ url('/produitsCats') }}">Afficher les produits par catégorie</a><br>
        <a href="{{ url('/ajouterProduit') }}">Ajouter un nouveau produit</a>
    </div>
</main>
<footer>Bastien Mézière</footer>
</body>
</html>