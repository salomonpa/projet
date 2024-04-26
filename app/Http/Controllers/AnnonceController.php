<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $annonce = Annonce::all();
        return view('Annonce.liste', compact('annonce'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Annonce.ajout');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([

            'nom_entreprise'=>'required',
            'ville'=>'required',
            'tel'=>'required',
            'message'=>'required',
            'photo'=>'required',
            
            






        ]);

        $annonce = new Annonce();
        $annonce->nom_entreprise = $request->nom_entreprise;
        $annonce->ville= $request->ville;
        $annonce->tel= $request->tel;
        $annonce->message= $request->message;
        $annonce->photo = $request->photo->store('photo','public');

        $blog->save();

        return redirect()->route('annonce.index')->with('status', 'Une annoncea  été ajouté avec succes.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('annonce.details',[

            'annonce' => Annonce::find($id)

      ]);

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $annonce = Annonce::find($id);
        return view('annonce.modifier',compact('annonce'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $annonce = annonce::find($id);

        $entreprise->update([
            'nom_entreprise' => $request->nom_entreprise,
            'ville' => $request->ville,
            'tel' => $request->tel,
            'message' => $request->message,
            'photo' => $request->photo,
            
        ]);

        return redirect()->route('annonce.index')->with('status', 'Une annonce a été modifié avec succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $annonce = Annonce::find($id);
        $annonce->delete();
        return redirect()->route('annonce.index')->with('status', 'Une annonce a été supprimée avec succes.');
    }
}
