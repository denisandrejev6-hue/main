<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lietotajs;

class LietotajuController extends Controller
{
    /**
     * Display a listing of lietotāji.
     */
    public function index()
    {
        $items = Lietotajs::orderBy('ID', 'asc')->get();
        return view('lietotaji.index', ['data' => $items]);
    }

    /**
     * Show the form for creating a new lietotājs.
     */
    public function create()
    {
        return view('lietotaji.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vards' => 'required|max:45',
            'uzvards' => 'required|max:45',
            'loma'  => 'required|in:Admin,Darbinieks,Lietotajs',
            'epasts' => 'required|email|unique:lietotaji,epasts',
            'parole' => 'required|min:8',
        ]);

        $validated['parole'] = bcrypt($validated['parole']);

        $data = new Lietotajs;
        $data->fill($validated);
        $data->save();

        return redirect('/lietotaji')->with('success', 'Dati veiksmīgi saglabāti');
    }

    /**
     * Display the specified lietotājs.
     */
    public function show($id)
    {
        $item = Lietotajs::findOrFail($id);
        return view('lietotaji.details', ['data' => $item]);
    }

    /**
     * Show the form for editing the specified lietotājs.
     */
    public function edit($id)
    {
        $item = Lietotajs::findOrFail($id);
        return view('lietotaji.edit', ['data' => $item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'vards' => 'required|max:45',
            'uzvards' => 'required|max:45',
            'loma'  => 'required|in:Admin,Darbinieks,Lietotajs',
            'epasts' => 'required|email|unique:lietotaji,epasts,' . $id,
            'parole' => 'nullable|min:8',
        ]);

        if (!empty($validated['parole'])) {
            $validated['parole'] = bcrypt($validated['parole']);
        } else {
            unset($validated['parole']);
        }

        $data = Lietotajs::findOrFail($id);
        $data->fill($validated);
        $data->save();

        return redirect('/lietotaji')->with('success', 'Dati veiksmīgi atjaunoti');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Lietotajs::findOrFail($id)->delete();
        return redirect('/lietotaji')->with('success', 'Dati veiksmīgi izdzēsti');
    }
}
