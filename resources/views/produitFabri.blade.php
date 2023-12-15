<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/app.css') }}">
    <title>Produit en fonction des fabricants</title>
</head>
<body>
    <header>
        <h1>Boutique HI-FI</h1>
    </header>
    <main class="produitFab">
        <a href="{{ url('/') }}">Retour à la page d'accueil</a><br>

        <h2>Filtrer par fabricant</h2>
            @foreach ($fabricants as $fabricant)
                <a href="{{ route('produit.fabricant', $fabricant->id) }}">- {{ $fabricant->nom }}</a>
            @endforeach
        <h2>Produits du fabricant {{ $selectedFabricant ? $selectedFabricant->nom : '' }}</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Modèle</th>
                    <th>Marque</th>
                    <th>Description</th>
                    <th>Prix Usine</th>
                    <th>Prix Vente Conseillé</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($produits as $produit)
                <tr>
                    <td>{{ $produit->id }}</td>
                    <td>{{ $produit->modèle }}</td>
                    <td>{{ $produit->marque }}</td>
                    <td>{{ $produit->description }}</td>
                    <td>{{ $produit->prixUsine }}</td>
                    <td>{{ $produit->prixVenteConseillé }}</td>
                @empty
                <li>Aucun produit trouvé</li>
                </tr>
            @endforelse
            </tbody>
        </table>
    </main>
    <footer>Bastien Mézière</footer>
</body>
</html>