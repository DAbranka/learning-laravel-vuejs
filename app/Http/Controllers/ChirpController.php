<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    /* ---------------------------------- INDEX----------------------------- */
    public function index()
    {
        // return "Hello World!";
        // return view('chirps.index'); // * return the index view in chirps folder
        return view('chirps.index', [
            'chirps' => Chirp::with('user')->latest()->get(),
        ]);
        
    }

    /* --------------------------------- CREATE --------------------------------- */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /* ---------------------------------- STORE --------------------------------- */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $request->user()->chirps()->create($validated);

        return redirect(route('chirps.index'));
    }
    /* -------------------------------------------------------------------------- */
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chirp  $chirp
     * @return \Illuminate\Http\Response
     */
    public function show(Chirp $chirp)
    {
        //
    }
    /* -------------------------------------------------------------------------- */

    /* ---------------------------------- EDIT ---------------------------------- */
    public function edit(Chirp $chirp)
    {
        $this->authorize('update', $chirp);

        return view('chirps.edit', [
            'chirp' => $chirp,
        ]);
    }
    /* -------------------------------------------------------------------------- */

    /* --------------------------------- UPDATE --------------------------------- */
    public function update(Request $request, Chirp $chirp)
    {
        $this->authorize('update', $chirp);

        $validated = $request->validated([
            'message' => 'required|string|max:255',
        ]);

        $chirp->update($validated);

        return redirect(route('chirps.index'));
    }

    /* -------------------------------------------------------------------------- */
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chirp  $chirp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chirp $chirp)
    {
        //
    }
}
