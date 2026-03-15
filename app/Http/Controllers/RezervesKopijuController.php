<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RezervesKopija;

class RezervesKopijuController extends Controller
{
    /**
     * Display a listing of rezerves kopijas.
     */
    public function index()
    {
        $items = RezervesKopija::orderBy('ID', 'asc')->get();
        return view('rezerveskopijas.index', ['data' => $items]);
    }

    /**
     * Show the form for creating a new record.
     */
    public function create()
    {
        return view('rezerveskopijas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fails' => 'required|max:45',
            'izveides_datums' => 'nullable|date',
        ]);

        $data = new RezervesKopija;
        $data->fill($validated);
        $data->save();

        return redirect('/rezerveskopijas')->with('success', 'Dati veiksmīgi saglabāti');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = RezervesKopija::findOrFail($id);
        return view('rezerveskopijas.details', ['data' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = RezervesKopija::findOrFail($id);
        return view('rezerveskopijas.edit', ['data' => $item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'fails' => 'required|max:45',
            'izveides_datums' => 'nullable|date',
        ]);

        $data = RezervesKopija::findOrFail($id);
        $data->fill($validated);
        $data->save();

        return redirect('/rezerveskopijas')->with('success', 'Dati veiksmīgi atjaunoti');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        RezervesKopija::findOrFail($id)->delete();
        return redirect('/rezerveskopijas')->with('success', 'Dati veiksmīgi izdzēsti');
    }
}
