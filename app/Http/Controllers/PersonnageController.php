<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnage;
use App\Models\Film;
use App\Models\CommentairesPersonnage;
use Illuminate\Support\Facades\Auth;

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
                'photo' => 'required',
                'age' => 'required',
                'power' => 'required',
                'dateofbirth' => 'required',

            ],

            [

                'firstname.required' => 'Veuillez entrer un prénom',
                'lastname.required' => 'Veuillez entrer un nom',
                'charactername.required' => 'Veuillez entrer le nom de son personnage',
                'photo.required' => 'Veuillez inserer une image',
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
        $personnages->photo = $request->photo;
        $personnages->age = $request->age;
        $personnages->power = $request->power;
        $personnages->dateofbirth = $request->dateofbirth;
        $personnages->films_id = $request->filmsid;
        $personnages->save();

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
        $commentairesPersonnage = CommentairesPersonnage::all()->where('personnage_id', $request->id);
        return view('detailpersonnage', ['personnages' => $personnages, 'commentairesPersonnage' => $commentairesPersonnage]);
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
        $commentairePersonnage = new CommentairesPersonnage();
        $commentairePersonnage->user_id = Auth::id();
        $commentairePersonnage->personnage_id = $request->id_personnage;
        $commentairePersonnage->content = $request->commentaire;
        $commentairePersonnage->save();

        return redirect(route('detailpersonnage', $request->id_personnage));
    }
}
