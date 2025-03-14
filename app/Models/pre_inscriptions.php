<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pre_inscriptions extends Model
{
    use HasFactory;
    
    protected $with= ['mention','speciality','financement','payment_mode'];
    
    const FAMILY_STATUSES = [
        'marie' => 'Marié',
        'celibataire' => 'Célibataire',
    ];

    const SEXES = [
        'masculin' => 'Masculin',
        'feminin' => 'Féminin',
    ];
    protected $fillable = [
        'name',
        'surname',
        'matricule',
        'birth_day',
        'birth_place',
        'city',
        'departement',
        'country',
        'nationality',
        'disabled',
        'obtaining',
        'serie',
        'school',
        'statut',
        'statutChief',
        'payment_mode_id',
        'study_abroad',
        'annee_passed1',
        'annee_passed2',
        'annee_passed3',
        'annee_passed4',
        'full_name',
        'phone_number',
        'date',
        'signature',
        'email',
        'mention_id',
        'financement_id',
        'user_id',
        'speciality_id', // Ajout de la relation avec Speciality
    ];


    // Relation avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation avec le modèle Mention
    public function mention()
    {
        return $this->belongsTo(Mention::class);
    }

    // Relation avec le modèle Financement
    public function financement()
    {
        return $this->belongsTo(Financement::class);
    }

    // Relation avec le modèle Speciality
    public function speciality()
    {
        return $this->belongsTo(Specialité::class);
    }
    public function payment_mode()
    {
        return $this->belongsTo(Paiement::class);
    }
    public function getRouteKeyName(): string
    {
        return 'id';
    }
}
