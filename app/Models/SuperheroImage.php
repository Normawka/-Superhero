<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperheroImage extends Model
{
    use HasFactory;
    protected $fillable = ['filename','superhero_id'];
    public function superhero(){
        return $this->belongsTo(Superhero::class);
    }
}
