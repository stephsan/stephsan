<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitFormRequest;
use App\Mail\AjoutProduit;
use App\Models\Categorie;
use App\Models\Produit;
use App\Models\User;
use App\Notifications\NouveauProduit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProduitController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin'])->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user= User::first();
        // $produit=Produit::orderByDesc('id')->first();
        // dd( $user->notify(new NouveauProduit($produit)));
        $produits= Produit::paginate(5);
       return view("front-office.produits.index", compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produit= new Produit();
        $categories= Categorie::all();
       return view("front-office.produits.create",compact("categories", "produit"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProduitFormRequest $request)
    {

        //dd(time());
        $imageName= "produit.png";
        if($request->file("image")){
            $imageName= time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs("public/produits", $imageName);
        }
        //dd($request->all());
        $produit = Produit::create([
            'designation'=>$request->designation,
            'prix'=>$request->prix,
            'quantite'=>$request->quantite,
            'categorie_id'=>$request->categorie,
            'description'=>$request->description,
            "image"=>$imageName,
        ]);

        $user=User::first();
         Mail::to($user)->send(new AjoutProduit($produit));
            return redirect()->route("produits.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        return view("front-office.produits.show", compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        $categories= Categorie::all();
        return view('front-office.produits.modifier', compact("produit", "categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProduitFormRequest $request, Produit $produit)
    {

        $produit->update([
            'designation'=>$request->designation,
            'prix'=>$request->prix,
            'quantite'=>$request->quantite,
            'description'=>$request->description
        ]);

        $user= User::first();
        $produit=Produit::orderByDesc('id')->first();
        $user->notify(new NouveauProduit($produit));
        return redirect()->route("produits.index")->with('status','Produit modifier avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Produit::destroy($id);
       return redirect()->route('produits.index')->with('status','votre produit a bien été supprimer');
    }
}
