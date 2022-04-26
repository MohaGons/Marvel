<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnage;

class PersonnageController extends Controller
{
    public function personnage()
    {
        $personnages = Personnage::paginate(15);
        return view('personnage', ['personnages' => $personnages]);
    }

    public function detailPersonnage(Request $request) 
    {
        $personnages = Personnage::find($request->id);    
        return view('detailpersonnage', ['personnages' => $personnages]);
    }
}
