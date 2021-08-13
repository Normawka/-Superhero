<?php

namespace App\Http\Controllers;

use App\Models\Superhero;
use Faker\Provider\Company;
use Illuminate\Http\Request;

class SuperheroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $superheros=Superhero::all();
        return view('superhero.index',compact('superheros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superhero.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Superhero::create($request->only([
            'nickname',
            'real_name',
            'origin_description',
            'superpowers',
            'catch_phrase',

        ]));
        return redirect()->route('superhero.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Superhero $superhero)
    {
        return view('superhero.show',compact('superhero'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Superhero $superhero)
    {
        return view('superhero.create',compact('superhero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Superhero $superhero)
    {
        $superhero->update($request->all());
        return redirect()->route('superhero.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Superhero $superhero)
    {
        $superhero->delete();
        return redirect()->route('superhero.index');
    }
}
