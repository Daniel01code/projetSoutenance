<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    
    public function payment_mode()
    {
        return $this->hasMany(pre_inscriptions::class);
    }
}
