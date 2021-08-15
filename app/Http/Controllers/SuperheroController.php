<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuperheroRequest;
use App\Models\Superhero;
use App\Models\SuperheroImage;
use Illuminate\Http\Request;

class SuperheroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $superheros = Superhero::paginate(5);
        return view('superhero.index', compact('superheros'))->with('i', (request()->input('page', 1) - 1) * 5);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SuperheroRequest $request)
    {
       $superhero = Superhero::create($request->only([
            'nickname',
            'real_name',
            'origin_description',
            'superpowers',
            'catch_phrase',

        ]));

            (new PhotosController)->createPhoto($request, $superhero);

        return redirect()->route('superhero.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Superhero $superhero
     * @return \Illuminate\Http\Response
     */
    public function show(Superhero $superhero)
    {
            $superhero = Superhero::with('superhero_images')->findOrFail($superhero->id);
        return view('superhero.show', compact('superhero'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Superhero $superhero)
    {
        return view('superhero.create', compact('superhero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SuperheroRequest $request, Superhero $superhero)
    {
        $superhero->update($request->all());

        if ($request->input('remove')) {
            (new PhotosController)->removePhoto($request->input('remove'));
        }

        (new PhotosController)->createPhoto($request, $superhero);

        return redirect()->route('superhero.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Superhero $superhero)
    {
        $superhero->delete();
        return redirect()->route('superhero.index');
    }
}
