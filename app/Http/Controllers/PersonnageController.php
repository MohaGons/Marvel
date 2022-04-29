<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnage;
use App\Models\Film;
use App\Models\CommentairesPersonnage;
use App\Models\PersonnageFilm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PersonnageController extends Controller
{


    public function addPersonnage(Request $request)
    {
        $films = Film::all();
        return view('addpersonnages', ['films' => $films]);
    }

    public function formPersonnage(Request $request)
    {
        $request->validate(
            [
                'firstname' => 'required',
                'lastname' => 'required',
                'charactername' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'age' => 'required',
                'power' => 'required',
                'dateofbirth' => 'required',

            ],

            [

                'firstname.required' => 'Veuillez entrer un prénom',
                'lastname.required' => 'Veuillez entrer un nom',
                'charactername.required' => 'Veuillez entrer le nom de son personnage',
                'image.required' => 'Veuillez inserer une image',
                'age.required' => 'Veuillez entrerson age',
                'power.required' => 'Veuillez entrer ses pouvoirs',
                'dateofbirth.required' => 'Veuillez entrer sa date de naissance',
            ]
        );

        $personnages = new Personnage();
        $personnages->user_id = Auth::id();
        $personnages->firstname = $request->firstname;
        $personnages->lastname = $request->lastname;
        $personnages->charactername = $request->charactername;
        $name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->store('public/image');
        $path = substr($path, 13);
        $personnages->photo = $path;
        $personnages->age = $request->age;
        $personnages->power = $request->power;
        $personnages->dateofbirth = $request->dateofbirth;
        $personnages->save();

        $lastInsertPersonnage = $personnages->id;
        $allFilm = [];
        foreach ($request->filmsid as $film) {
            $personnageFilm = new PersonnageFilm();
            $personnageFilm->personnage_id = $lastInsertPersonnage;
            $personnageFilm->films_id = $film;
            $personnageFilm->save();
        }

        return redirect(route('personnage'));
    }

    public function personnage()
    {
        $personnages = Personnage::paginate(5);
        return view('personnage', ['personnages' => $personnages]);
    }

    public function detailPersonnage(Request $request)
    {
        $personnages = Personnage::find($request->id);
        $personnage_films = PersonnageFilm::all()->where('personnage_id', $request->id);

        $films = [];
        foreach ($personnage_films as $personnage_film) {
            $films[] = Film::find($personnage_film)[0]->name;
            
        }
       
        return view('detailpersonnage', ['personnages' => $personnages, 'films' => $films]);
    }


    public function deletePersonnage(Request $request)
    {
        $personnages = Personnage::find($request->id);
        if ($personnages->user_id != Auth::id())
            abort(404);
        $personnages->delete();
        return redirect(route('personnage'));
    }


    public function film()
    {
        $films = Film::paginate(5);
        return view('film', ['films' => $films]);
    }

    public function postCommentairePersonnage(Request $request)
    {

        $request->validate(
            [
                'commentaire' => 'required|min:10',

            ],

            [
                'commentaire.required' => 'Ce champ est requis',
                'commentaire.min' => 'Ce commentaire dois faire 10 caractères minimum'
            ]
        );
        $commentairePersonnage = new CommentairesPersonnage();
        $commentairePersonnage->user_id = Auth::id();
        $commentairePersonnage->personnage_id = $request->id_personnage;
        $commentairePersonnage->content = $request->commentaire;
        $commentairePersonnage->save();

        return redirect(route('detailpersonnage', $request->id_personnage));
    }

    public function deleteCommentaire(Request $request)
    {
        $commentairePersonnage = CommentairesPersonnage::find($request->id);
        if ($commentairePersonnage->user_id != Auth::id())
            abort(404);

        $commentairePersonnage->delete();

        return redirect(route('detailpersonnage', $commentairePersonnage->personnage_id));
    }

    public function formUpdateCommentaire(Request $request)
    {
        $commentairePersonnage = CommentairesPersonnage::find($request->id);
        if ($commentairePersonnage->user_id != Auth::id())
            abort(404);

        return view('formUpdateCommentaire', ['commentairePersonnage' => $commentairePersonnage]);
    }

    public function updateCommentaire(Request $request)
    {
        $commentairePersonnage = CommentairesPersonnage::find($request->id);
        if ($commentairePersonnage->user_id != Auth::id())
            abort(404);

        $commentairePersonnage->content = $request->commentaire;
        $commentairePersonnage->save();

        return redirect(route('detailpersonnage', $commentairePersonnage->personnage_id));
    }
}
