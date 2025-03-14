<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cathegory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function specialities()
    {
        return $this->hasMany(Specialité::class, 'cathegory_id'); // Assurez-vous que c'est 'cathegory_id'
    }
}