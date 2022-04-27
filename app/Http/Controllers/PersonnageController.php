<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnage;
use App\Models\Film;

class PersonnageController extends Controller
{
    public function personnage()
    {
        $personnages = Personnage::paginate(2);
        return view('personnage', ['personnages' => $personnages]);
    }

    public function detailPersonnage(Request $request) 
    {
        $personnages = Personnage::find($request->id);    
        return view('detailpersonnage', ['personnages' => $personnages]);
    }

    public function film() 
    {
        $films = Film::paginate(2);    
        return view('film', ['films' => $films]);
    }
}
