<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\CommentairesPersonnage;

class CommentairesPersonnage extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'commentaires_personnages';

    public function personnage()
    {
        return $this->belongsTo(CommentairesPersonnage::class);
    }

    public function user()
    {
       return $this->belongsTo(User::class);
    }

}
