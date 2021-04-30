@component('mail::message')
# Du nouveau
## Un nouveau produit vient d'etre ajouter sur votre superbe plateforme  OpenShop

Vous trouverez ci-dessous les information sur le produit
Pour commander cliquer sur le boutton ci-dessous
### Designation:{{ $produit->designation }}
### Prix:{{ $produit->prix }}
### Categorie:{{ $produit->categorie->libelle }}
<br>
@component('mail::button', ['url' => route("produits.show", $produit)])
Commander ce produit
@endcomponent

Merci d'avoir choisi OpenShop pour votre shopping,<br>
{{ config('app.name') }}
@endcomponent
