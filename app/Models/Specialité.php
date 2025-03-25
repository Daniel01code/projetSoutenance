<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Specialité extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'cathegory_id'];

    protected $table = 'specialités';

    // public function cathegory()
    // {
    //     return $this->belongsTo(Cathegory::class, 'cathegory_id', 'id');
    // }

    public function preInscriptions() :HasMany
    {
        return $this->hasMany(PreInscription::class, 'speciality_id');
    }
    public function cathegory()
    {
        return $this->belongsTo(Cathegory::class, 'cathegory_id');
    }
}
