<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnage;
use App\Models\Film;
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
        return view('detailpersonnage', ['personnages' => $personnages]);
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
}
