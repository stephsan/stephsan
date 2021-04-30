<x-master-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Modifier produit </h1>
            </div>
        </div>
        <div class="row">
            <div class="row">

            </div>
            <div class="col-md-12">
                <form method="POST" action="{{ route("produits.update", $produit) }}">
                    @method('PUT')
               @include('partials._produit-form')
                </form>
            </div>
        </div>
    </div>
</x-master-layout>
