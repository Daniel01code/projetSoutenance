<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialité extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'cathegory_id'];

    public function cathegory()
    {
        return $this->belongsTo(Cathegory::class, 'cathegory_id'); // Assurez-vous que c'est 'cathegory_id'
    }
}
