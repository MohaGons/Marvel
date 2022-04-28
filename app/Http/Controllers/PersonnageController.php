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
        $personnages = new Personnage();
        $personnages->user_id = Auth::id();
        $personnages->firstname = $request->personnages;
        $personnages->lastname = $request->personnages;
        $personnages->charactername = $request->personnages;
        $personnages->photo = $request->personnages;
        $personnages->age = $request->personnages;
        $personnages->power = $request->personnages;
        $personnages->dateofbirth = $request->personnages;
        $personnages->films_id = $request->personnages;
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
