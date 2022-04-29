<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CommentairesPersonnage;
use App\Models\PersonnageFilm;

class Personnage extends Model
{
    use HasFactory;

    public function commentaires()
    {
        return $this->hasMany(CommentairesPersonnage::class);
    }

    public function personnageFilm() 
    {
        return $this->hasMany(PersonnageFilm::class);
    }
}
