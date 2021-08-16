<?php

namespace Database\Factories;

use App\Models\SuperheroImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class SuperheroImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SuperheroImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'filename'=>'Superman01.jpg',
            'superhero_id'=> 1
        ];
    }
}
