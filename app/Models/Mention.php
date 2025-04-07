<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mention extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    
    public function preInscriptions()
    {
        return $this->hasMany(PreInscription::class, 'payment_mode_id');
    }
}
