<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprise;
use App\Models\Categorie;
class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entreprise = Entreprise::all();
        return view('Entreprises.liste', compact('entreprise'));
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

        $entreprise = new Entreprise();
        $entreprise->nom = $request->nom;
        $entreprise->responsable= $request->responsable;
        $entreprise->activite= $request->activite;
        $entreprise->effectif = $request->effectif;
        $entreprise->mail = $request->mail;
        $entreprise->tel = $request->tel;
        $entreprise->date_existence = $request->date_existence;
        $entreprise->langued_affaire = $request->langued_affaire;
        $entreprise->ville = $request->pays;
        $entreprise->adresse = $request->adresse;
        $entreprise->pays = $request->pays;
        $entreprise->categories_id = $request->categories_id;
        $entreprise->statut_juridique = $request->statut_juridique;
        $entreprise->existence_officielle = $request->existence_officielle ;
        $entreprise->photo = $request->photo->store('photo','public');

        $entreprise->save();

        return redirect()->route('entreprise.index')->with('status', 'Une entreprise a  été ajouté avec succes.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('entreprise.details',[

            'entreprise' => Entreprise::find($id)

      ]);

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $entreprise = Entreprise::find($id);
        return view('entreprise.modifier',compact('entreprise'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $entreprise = entreprise::find($id);

        $entreprise->update([
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

        return redirect()->route('entreprise.index')->with('status', 'Une entreprise a  été modifié avec succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $entreprise = Entreprise::find($id);
        $entreprise->delete();
        return redirect()->route('entreprise.index')->with('status', 'Entreprise a  été supprimé avec succes.');
    }
}
