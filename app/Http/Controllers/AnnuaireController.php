<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annuaire;
use App\Models\Categorie;
class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $annuaire = Annuaire::all();
        return view('Annuaire.liste', compact('annuaire'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        $categories = Categorie::all();
        return view('Entreprises.ajout' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $request->validate([

        //     'nom'=>'required',
        //     'responsable'=>'required',
        //     'activite'=>'required',
        //     'effectif'=>'required',
        //     'mail'=>'required',
        //     'langued_affaire'=>'required',
        //     'tel'=>'required',
        //     'date_existence'=>'required',
        //     'ville'=>'required',
        //     'adresse'=>'required',
        //     'pays'=>'required',
        //     'statut_juridique'=>'required',
        //     'existence_officielle'=>'required',
            

        //     'photo'=>'required',
        // ]);

         $annuaire  = new Entreprise();
         $annuaire ->nom = $request->nom;
         $annuaire ->responsable= $request->responsable;
         $annuaire ->activite= $request->activite;
         $annuaire ->effectif = $request->effectif;
         $annuaire ->mail = $request->mail;
         $annuaire ->tel = $request->tel;
         $annuaire ->date_existence = $request->date_existence;
         $annuaire ->langued_affaire = $request->langued_affaire;
         $annuaire ->ville = $request->pays;
         $annuaire ->adresse = $request->adresse;
         $annuaire ->pays = $request->pays;
         $annuaire ->categories_id = $request->categories_id;
         $annuaire ->statut_juridique = $request->statut_juridique;
         $annuaire ->existence_officielle = $request->existence_officielle ;
         $annuaire ->photo = $request->photo->store('photo','public');

         $annuaire ->save();

        return redirect()->route(' annuaire .index')->with('status', 'Un annuaire a  été ajouté avec succes.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('annuaire.details',[

            'annuaire' => Annuaire::find($id)

      ]);

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $annuaire = Annuaire::find($id);
        return view('annuaire.modifier',compact('annuaire'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $annuaire = annuaire::find($id);

        $annuaire->update([
            'nom' => $request->nom,
            'photo' => $request->photo,
            'responsable' => $request->responsable,
            'activite' => $request->activite,
            'effectif' => $request->effectif,
            'mail' => $request->mail,
            'langued_affaire'  => $request->langued_affaire,
            'tel' => $request->tel,
            'date_existence' => $request->date_existence,
            'pays'  => $request->pays,
            'adresse' => $request->adresse,
            'categories_id' => $request->categories_id,
        ]);

        return redirect()->route('annuaire.index')->with('status', 'Un annuaire a  été modifié avec succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $annuaire = Annuaire::find($id);
        $annuaire->delete();
        return redirect()->route('annuaire.index')->with('status', 'Annuaire a  été supprimé avec succes.');
    }
}
