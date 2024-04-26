<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reponse;
use App\Models\Commentaire;
class ReponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reponse = Reponse::all();
        return view('Reponse.liste', compact('categorie'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Reponse.ajout');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([

            'nom'=>'required',
            'texte'=>'required',
        ]);

        $reponse = new Reponse();
        $reponse->nom = $request->nom;
        $reponse->texte = $request->texte;
        $reponse->save();

        return redirect()->route('Categorie.index')->with('status', 'Une reponse a été ajouté avec succes.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('Reponse.details',[

            'reponse' => Reponse::find($id)

      ]);

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reponse = Reponse::find($id);
        return view('reponse.modifier',compact('reponse'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $reponse = reponse::find($id);

        $reponse->update([
            'nom' => $request->nom,
            'texte' => $request->texte,
            
        ]);

        return redirect()->route('reponse.index')->with('status', 'Une Reponse a  été modifié avec succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reponse = Reponse::find($id);
        $reponse->delete();
        return redirect()->route('reponse.index')->with('status', 'Reponse a  été supprimé avec succes.');
    }
}
