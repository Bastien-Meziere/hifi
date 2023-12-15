<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/app.css') }}">
    <title>Catalogue des produits</title>
</head>
<body>
    <header>
        <h1>Boutique HI-FI</h1>
    </header>
    <main class="produit">
        <!-- Lien vers la page d'accueil -->
        <a href="{{ url('/') }}">Retour à la page d'accueil</a><br>

        <h2>Catalogue des produits</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Modèle</th>
                    <th>Marque</th>
                    <th>Description</th>
                    <th>Prix Usine</th>
                    <th>Prix Vente Conseillé</th>
                    <th>Fabricant</th>
                    <th>Catégorie(s)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produits as $produit)
                    <tr>
                        <td>{{ $produit->id }}</td>
                        <td>{{ $produit->modèle }}</td>
                        <td>{{ $produit->marque }}</td>
                        <td>{{ $produit->description }}</td>
                        <td>{{ $produit->prixUsine }}</td>
                        <td>{{ $produit->prixVenteConseillé }}</td>
                        <td>{{ $produit->fabricants->nom }}</td>
                        <td>
                            <ul>
                                @foreach ($produit->categories as $categorie)
                                    <li>{{ $categorie->libellé }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
    <footer>Bastien Mézière</footer>
</body>
</html>
