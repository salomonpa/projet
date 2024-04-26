<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;
use App\Models\Blog;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commentaire = Commentaire::all();
        return view('Commentaire.liste', compact('commentaire'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        $blog = Blog::all();
        return view('Commentaire.ajout' , compact('blog'));
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

       $commentaire = new Commentaire();
       $commentaire->nom = $request->nom;
       $commentaire->texte= $request->texte;
       

       $commentaire->save();

        return redirect()->route('commentaire.index')->with('status', 'Un commentairea  été ajouté avec succes.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('commentaire.details',[

            'commentaire' => Commentaire::find($id)

      ]);

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $commentaire =Commentaire::find($id);
        return view('Commentaire.modifier',compact('commentaire'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $commentaire = commentaire::find($id);

        $commentaire->update([
            'nom' => $request->nom,
            'texte' => $request->texte,
            'blog_id' => $request->blog_id,
        ]);

        return redirect()->route('commentaire.index')->with('status', 'Un commentaire a  été modifié avec succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $commentaire = Commentaire::find($id);
        $commentaire->delete();
        return redirect()->route('commentaire.index')->with('status', 'Commentaire a  été supprimé avec succes.');
    }
}
