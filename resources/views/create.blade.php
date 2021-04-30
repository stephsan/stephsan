<x-master-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Nouveua produit </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route("produits.store") }}">
                    @method('POST')
                    @include('partials._produit-form')
                </form>
            </div>
        </div>
    </div>
</x-master-layout>
