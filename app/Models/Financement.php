<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financement extends Model
{
    use HasFactory;
    // Relation avec le modèle PreInscription
    public function preInscriptions()
    {
        return $this->hasMany(pre_inscriptions::class);
    }
}

