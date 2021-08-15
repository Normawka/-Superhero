<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Superhero extends Model
{
    use HasFactory;
    protected $fillable = [
            'nickname',
            'real_name',
            'origin_description',
            'superpowers',
            'catch_phrase',
        ];
    public function superhero_images(){
        return $this->hasMany(SuperheroImage::class);
    }
}
