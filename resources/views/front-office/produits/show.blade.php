<x-master-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2">
                <h1 class="text-center">{{ $produit->desination }}</h1>
                <hr>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6 offset-md-5">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-primary">Prix: {{ $produit->prix }}
                    </li>
                    <li class="list-group-item list-group-item-warning ">Quantite: {{ $produit->quantite }}</li>
                    <li class="list-group-item list-group-item-dark ">Description: {{ $produit->description }} </li>
                </ul>
            </div>
        </div>
    </div>
</x-master-layout>
