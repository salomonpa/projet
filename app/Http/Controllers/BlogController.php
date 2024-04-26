<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog = Blog::all();
        return view('Blog.liste', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Blog.ajout');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([

            'titre'=>'required',
            'date'=>'required',
            'texte'=>'required',
            'photo'=>'required',
        

        ]);

        $blog = new Blog();
        $blog->titre = $request->titre;
        $blog->date= $request->date;
        $blog->texte= $request->texte;
        $blog->photo = $request->photo->store('photo','public');

        $blog->save();

        return redirect()->route('blog.index')->with('status', 'Une publication a  été ajouté avec succes.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('blog.details',[

            'blog' => Blog::find($id)

      ]);

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::find($id);
        return view('blog.modifier',compact('blog'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $blog = blog::find($id);

        $entreprise->update([
            'photo' => $request->photo,
            'titre' => $request->titre,
            'date' => $request->date,
            'texte' => $request->texte,
            
        ]);

        return redirect()->route('blog.index')->with('status', 'Une publication a été modifié avec succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->route('entreprise.index')->with('status', 'Une publication a été supprimée avec succes.');
    }
}
