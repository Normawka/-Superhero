<?php

namespace Database\Factories;

use App\Models\Superhero;
use Illuminate\Database\Eloquent\Factories\Factory;

class SuperheroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Superhero::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nickname'=> 'Superman',
            'real_name'=>'Clark Kent',
            'origin_description'=>'he was born Kal-El on the planet Krypton, before being rocketed to
             Earth as an infant by his scientist father Jor-El, moments before Krypton s destruction…',
            'superpowers'=>'solar energy absorption and healing factor, solar flare and heat vision,
                solar invulnerability, flight…',
            'catch_phrase'=>"Look, up in the sky, it's a bird, it's a plane, it's Superman!",
        ];
    }
}
