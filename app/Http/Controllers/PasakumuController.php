<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasakumi;
use App\Models\Telpa;
use App\Models\Lietotajs;

class PasakumuController extends Controller
{
    /**
     * Display a listing of the pasakumi.
     */
    public function index()
    {
        $pasakums = Pasakumi::all();
    if (auth()->user()->loma === 'Lietotajs') {
        $pasakums = Pasakumi::where('darbinieks_id', auth()->id())->get();
    } else {
        $pasakums = Pasakumi::all();
    }
    return view('pasakumi', ['pasakumi' => $pasakums]);
    }

    /**
     * Show the form for creating a new pasakumi.
     */
    public function create()
    {
        if (auth()->user()->loma === 'Lietotajs') {
            abort(403);
        }

        // prepare dropdown data for the form
        $telpas = \App\Models\Telpa::orderBy('ID')->get();
        $darbinieki = \App\Models\Lietotajs::where('loma', 'Darbinieks')
                        ->orderBy('ID')
                        ->get();

        return view('create', compact('telpas', 'darbinieki'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->loma === 'Lietotajs') {
            abort(403);
        }

        $validated = $request->validate([
            'nosaukums'      => 'required|max:45',
            'kategorija'     => 'nullable|max:45',
            'datums_no'      => 'nullable|date|before:datums_lidz',
            'datums_lidz'    => 'nullable|date|after:datums_no',
            'sakuma_laiks'   => 'nullable|date_format:H:i|time_before_or_equal:beigu_laiks',
            'beigu_laiks'    => 'nullable|date_format:H:i|time_after_or_equal:sakuma_laiks',
            'apraksts'       => 'nullable|max:255',
            'darbinieks_id'  => 'nullable|integer',
            'telpa_id'       => 'nullable|integer',
        ], [
            'sakuma_laiks.time_before_or_equal' => 'Sākuma laiks nedrīkst būt pēc beigu laika.',
            'beigu_laiks.time_after_or_equal' => 'Beigu laiks nedrīkst būt pirms sākuma laika.',
        ]);

        $data = new Pasakumi;
        $data->fill($validated);
        $data->save();

        // return to the page the user came from (home or list)
        $previous = url()->previous();
        if (rtrim($previous, '/') === url('/')) {
            return redirect('/')->with('success', 'Dati veiksmīgi saglabāti');
        }
        return redirect('/pasakumi')->with('success', 'Dati veiksmīgi saglabāti');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = Pasakumi::findOrFail($id);
        return view('details', ['data' => $item]);
    }

public function edit($id)
{
    if (auth()->user()->loma === 'Lietotajs') {
        abort(403);
    }

    $item = Pasakumi::findOrFail($id);
    $telpas = \App\Models\Telpa::orderBy('ID')->get();
    $darbinieki = \App\Models\Lietotajs::where('loma', 'Darbinieks')
                    ->orderBy('ID')
                    ->get();

    return view('edit', compact('item', 'telpas', 'darbinieki')); 
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()->loma === 'Lietotajs') {
            abort(403);
        }

        $validated = $request->validate([
            'nosaukums'      => 'required|max:45',
            'kategorija'     => 'nullable|max:45',
            'datums'         => 'nullable|date',
            'sakuma_laiks'   => 'nullable|date_format:H:i|time_before_or_equal:beigu_laiks',
            'beigu_laiks'    => 'nullable|date_format:H:i|time_after_or_equal:sakuma_laiks',
            'apraksts'       => 'nullable|max:255',
            'darbinieks_id'  => 'nullable|integer',
            'telpa_id'       => 'nullable|integer',
        ], [
            'sakuma_laiks.time_before_or_equal' => 'Sākuma laiks nedrīkst būt pēc beigu laika.',
            'beigu_laiks.time_after_or_equal' => 'Beigu laiks nedrīkst būt pirms sākuma laika.',
        ]);

        $data = Pasakumi::findOrFail($id);
        $data->fill($validated);
        $data->save();

        $previous = url()->previous();
        if (rtrim($previous, '/') === url('/')) {
            return redirect('/')->with('success', 'Dati veiksmīgi atjaunoti');
        }
        return redirect('/pasakumi')->with('success', 'Dati veiksmīgi atjaunoti');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (auth()->user()->loma === 'Lietotajs') {
            abort(403);
        }

        Pasakumi::findOrFail($id)->delete();
        $previous = url()->previous();
        if (rtrim($previous, '/') === url('/')) {
            return redirect('/')->with('success', 'Dati veiksmīgi izdzēsti');
        }
        return redirect('/pasakumi')->with('success', 'Dati veiksmīgi izdzēsti');
    }

    
}
