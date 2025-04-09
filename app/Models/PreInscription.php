<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mention;
use App\Models\Financement;
use App\Models\Specialité;
// use League\CommonMark\Extension\Mention\Mention;

class PreInscription extends Model
{
    use HasFactory;

    protected $table = 'preinscriptions'; // Nouveau nom de la table
    
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
     'user_id',
        'matricule',
        'name',
        'surname',
        'birth_day',
        'birth_place',
        'city',
        'departement',
        'country',
        'sex',
        'nationality',
        'family_status',
        'disabled',
        'obtaining',
        'serie',
        'mention_id',
        'school',
        'speciality_id',
        'statut',
        'statutChief',
        'financement_id',
        'payment_mode_id',
        'study_abroad',
        'annee_passed1',
        'annee_passed2',
        'annee_passed3',
        'annee_passed4',
        'full_name',
        'phone_number',
        'email',
        'date',
        'signature',
    ];

    // Relation avec User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relation avec Mention
    public function mention()
    {
        return $this->belongsTo(Mention::class, 'mention_id');
    }

    // Relation avec Financement
    public function financement()
    {
        return $this->belongsTo(Financement::class, 'financement_id');
    }

    // Relation avec Specialité
    public function speciality()
    {
        return $this->belongsTo(Specialité::class, 'speciality_id');
    }

    // Relation avec Paiement
    public function payment_mode()
    {
        return $this->belongsTo(Paiement::class, 'payment_mode_id');
    }

    public function getRouteKeyName(): string
    {
        return 'id';
    }
}
