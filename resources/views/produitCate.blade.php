<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/app.css') }}">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Boutique HI-FI</h1>
    </header>
    <main class="produitCat">
        <a href="{{ url('/') }}">Retour à la page d'accueil</a><br>

        <h2>Choisir une/plusieurs catégorie(s)</h2>
        <form action="{{ route('produit.categorie') }}" method="get">
            @csrf
                @foreach ($categories as $categorie)
                        <input type="checkbox" name="categories[]" value="{{ $categorie->id }}"
                            {{ in_array($categorie->id, old('categories', [])) ? 'checked' : '' }}>
                        <label>{{ $categorie->libellé }}</label><br>
                @endforeach
            <button type="submit" class="bouton-categorie">Filtrer</button>
        </form>
        <h2>Produits par catégorie</h2>
        @if ($produits->isNotEmpty())

        @foreach ($produits as $produit)
        <ul><strong>Catégorie:</strong> 
                @foreach ($produit->categories as $categorie)
                    {{ $categorie->libellé }}
                @endforeach
                <br>
                <strong>Produit:</strong> {{ $produit->modèle }} - {{ $produit->marque }} - {{ $produit->description }}</ul>
        @endforeach

        @else
            <p>Aucun produit trouvé pour les catégories sélectionnées.</p>
        @endif
    </main>
    <footer>Bastien Mézière</footer>
</body>
</html>