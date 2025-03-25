<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cathegory extends Model
{
    use HasFactory;

    protected $with = ['specialities'];

    protected $fillable = ['name'];

    protected $table = 'cathegories'; // Nom de la table

    /**
     * Une catégorie a plusieurs spécialités
     */
    public function specialities()
    {
        return $this->hasMany(Specialité::class, 'cathegory_id', 'id');
    }
    public function specialités()
    {
        return $this->hasMany(Specialité::class); // Ou le nom exact de votre modèle Specialité
    }
}