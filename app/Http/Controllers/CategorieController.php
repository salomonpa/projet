<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorie = Categorie::all();
        return view('Categories.liste', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Categories.ajout');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([

            'nom'=>'required',
            
        ]);

        $categorie = new Categorie();
        $categorie->nom = $request->nom;
        $categorie->save();

        return redirect()->route('Categorie.index')->with('status', 'Une categorie a été ajouté avec succes.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('Categorie.details',[

            'categorie' => Categorie::find($id)

      ]);

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categorie = Categorie::find($id);
        return view('categorie.modifier',compact('categorie'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $categorie = categorie::find($id);

        $categorie->update([
            'nom' => $request->nom,
            
        ]);

        return redirect()->route('categorie.index')->with('status', 'Une categorie a  été modifié avec succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categorie = Categorie::find($id);
        $categorie->delete();
        return redirect()->route('categorie.index')->with('status', 'Catégorie a  été supprimé avec succes.');
    }
}
