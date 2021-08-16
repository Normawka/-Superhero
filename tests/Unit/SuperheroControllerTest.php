<?php

namespace Tests\Unit;

use App\Http\Requests\SuperheroRequest;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\SuperheroController;
use App\Models\Superhero;
use Mockery;
use Tests\TestCase;
use Faker\Factory as Faker;
class SuperheroControllerTest extends TestCase
{

public function testCreate(){
    $this->withExceptionHandling();
    $response = $this->post('superhero',[
        'nickname'=>'write2',
        'real_name'=>'name',
        'origin_description'=>'sddsd',
        'superpowers'=>'sdsds',
        'catch_phrase'=>'sdsdsd',
    ]);
    $response->assertStatus(302);
    $this->assertTrue(count(Superhero::all())>1);

}
public function testDelete(){
    $this->withExceptionHandling();
 //   Superhero::factory()->times(5)->create();
    $id_to_deleted= random_int(1,5);
    $this->delete("superhero/$id_to_deleted");
    $this->assertDatabaseMissing('superheroes',['id'=>$id_to_deleted]);
}
}
