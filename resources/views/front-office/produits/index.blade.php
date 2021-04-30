<x-master-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2">
                <h1 class="text-center">Liste de nos produits</h1>
                <div class="text-center">Notre catalogue comporte {{ nb_produit(2) }}</div>
                <hr>
            </div>

        </div>
        <div class="row">
            @if(session('status'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>{{ session('status') }} ddd</strong>
            </div>
            @endif
            @if (Auth::user()==null && Auth::user()->isAdmin())
            <div class="">
                <a href="{{ route('produits.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Ajouter</a>
             </div>
            @endif

            <div class="col-md-12">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Désignation</th>
                                <th class="col-md-2" >Prix</th>
                                <th>Quantite</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produits as $produit)
                                <tr>
                                    <td scope="row">{{ $produit->designation }}</td>
                                    <td >{{ format_prix($produit->prix) }}</td>
                                    <td>{{ $produit->quantite }}</td>
                                    <td>{{ $produit->description }}</td>

                                    <td class= "d-flex">
                                        <a href="{{ route('produits.show', $produit) }}" class="btn btn-warning mr-2"> <i class="fas fa-eye"></i></a>
                                        {{-- @if (Auth::user()==null && Auth::user()->isAdmin()) --}}
                                        <a class="btn btn-primary btn-sm mr-2" href="{{ route('produits.edit', $produit) }}"><i class="fas fa-edit"></i></a>
                                        <a onclick="event.preventDefault(); if(confirm('Etes vous sur de supprimer le produite')) document.getElementById('{{ $produit->id }}').submit()" href="" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                             <form style="display: none" id="{{ $produit->id }}" method="POST" action="{{ route('produits.destroy', $produit) }}">
                                                @csrf
                                                @method("DELETE")
                                        </form>
                                        {{-- @endif --}}

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row d-flex justify-content-center mt-5">
                        <div class="">
                            {{ $produits->links() }}
                        </div>
                    </div>
            </div>
        </div>
    </div>
</x-master-layout>
