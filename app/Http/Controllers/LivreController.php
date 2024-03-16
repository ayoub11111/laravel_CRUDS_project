<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livre;

class LivreController extends Controller
{
    //
    public function afficher(){
        $livres = Livre::all();
        return view('Livre.afficher', ['livres'=>$livres]);
    }
    public function ajouter(){
        return view('Livre.ajouter');
    }
    public function store(Request $request){
        $data = $request->validate([
            'titre'=>'required',
            'nom_auteur'=>'required'
        ]);
        $newLivre = Livre::create($data);
        return redirect(route('afficher_livres'));

    }
    public function edit(Livre $livre){
        return view('Livre.modifier', ['livre'=>$livre]);
    }
    public function modifier(Request $request, Livre $livre){
        $data=$request->validate([
            "titre"=>"required",
            "nom_auteur"=>"required"
        ]);
        $livre->update($data);
        return redirect(route("afficher_livres"))->with('BienModifier',"Le livre a bien été modifié");
    }

    public function supprimer(Livre $livre) {
        $livre->delete();
        return redirect(route("afficher_livres"))->with('BienSupprimer','Le livre a bien été supprimé');
    }

    public function search(Request $request)
    {
        $query = $request->input('auteur');
        $livres = Livre::where('nom_auteur', 'like', '%'.$query.'%')->get();
        return view('Livre.afficher', ['livres' => $livres]);
    }
}
