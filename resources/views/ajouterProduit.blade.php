<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/app.css') }}">
    <title>Ajouter un produit</title>
</head>
<body>
<header>
    <h1>Boutique HI-FI</h1>
</header>
<main class="ajoutProduit">
    <a href="{{ url('/') }}">Retour à la page d'accueil</a><br>

    <h2>Ajouter un produit</h2>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

        <!-- Formulaire d'ajout de produit -->
        <form action="{{ route('ajouterProduit') }}" method="post">
            @csrf

            <label for="modele">Modèle:</label>
            <input class="f-ajout" type="text" id="modele" name="modele" required>
            <br>
            <label for="marque">Marque:</label>
            <input class="f-ajout" type="text" id="marque" name="marque" required>
            <br>
            <label class="l-textarea" for="description">Description:</label>
            <textarea class="f-ajout" id="description" name="description" required></textarea>
            <br>
            <label for="prixUsine">Prix Usine:</label>
            <input class="f-ajout" type="number" id="prixUsine" name="prixUsine" required>
            <br>
            <label for="prixVenteConseille">Prix de Vente Conseillé:</label>
            <input class="f-ajout" type="number" id="prixVenteConseille" name="prixVenteConseille" required>
            <br>
            <label for="id_fabricant">Fabricant:</label>
            <select class="f-ajout" id="id_fabricant" name="id_fabricant" required>
                @foreach ($fabricants as $fabricant)
                    <option value="{{ $fabricant->id }}">{{ $fabricant->nom }}</option>
                @endforeach
            </select>
            <br>
            <label for="id_categorie">Catégorie:</label>
            @foreach ($categories as $categorie)
            <input type="checkbox" name="categories[]" value="{{ $categorie->id }}">
            <label>{{ $categorie->libellé }}</label>
            @endforeach
            <br>
            <button type="submit" class="bouton-ajout">Ajouter le produit</button>
        </form>
</main>
<footer>Bastien Mézière</footer>
</body>
</html>