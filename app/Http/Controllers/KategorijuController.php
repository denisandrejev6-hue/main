<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasakumi;
use App\Models\Telpa;
use App\Models\Lietotajs;
use App\Models\Kategorija;

class KategorijuController extends Controller
{
    /**
     * Parāda visu kategoriju sarakstu
     */
    public function index()
    {
        // Iegūst visas kategorijas no datubāzes, sakārtotas pēc ID augošā secībā
        $items = Kategorija::orderBy('ID', 'asc')->get();
        
        // Atgriež skatu ar kategoriju sarakstu
        return view('kategorija.index', ['data' => $items]);
    }

    /**
     * Parāda formu jaunas kategorijas izveidei
     */
    public function create()
    {
        // Pārbauda vai lietotājs nav ar lomu 'Lietotajs' - ja ir, piekļuve liegta
        if (auth()->user()->loma === 'Lietotajs') {
            abort(403); // 403 - Forbidden (piekļuve liegta)
        }

        // Atgriež skatu ar kategorijas izveides formu
        return view('kategorija.create');
    }


    

    /**
     * Parāda formu kategorijas rediģēšanai
     */
    public function edit($id)
    {
        // Pārbauda vai lietotājs nav ar lomu 'Lietotajs'
        if (auth()->user()->loma === 'Lietotajs') {
            abort(403);
        }

        // Atrod rediģējamo kategoriju
        $item = Kategorija::findOrFail($id);
        
        // Atgriež rediģēšanas skatu ar kategorijas datiem
        return view('edit_kategorija', ['item' => $item]);
    }

    /**
     * Atjaunina kategorijas datus datubāzē
     */
    public function update(Request $request, $id)
    {
        // Pārbauda vai lietotājs nav ar lomu 'Lietotajs'
        if (auth()->user()->loma === 'Lietotajs') {
            abort(403);
        }

        // Atrod atjaunināmo kategoriju
        $item = Kategorija::findOrFail($id);

        // Validācija - nosaukums ir obligāts un max 45 simboli
        $validated = $request->validate([
            'nosaukums' => 'required|max:45',
        ]);

        // Atjaunina kategorijas datus
        $item->update($validated);

        // Pāradresē uz kategoriju sarakstu ar veiksmes paziņojumu
        return redirect()->route('kategorijas.index')->with('success', 'Kategorija veiksmīgi atjaunināta.');
    }

    /**
     * Izdzēš kategoriju no datubāzes
     */
    public function destroy($id)
    {
        // Pārbauda vai lietotājs nav ar lomu 'Lietotajs'
        if (auth()->user()->loma === 'Lietotajs') {
            abort(403);
        }

        // Atrod dzēšamo kategoriju
        $item = Kategorija::findOrFail($id);
        
        // Izdzēš kategoriju
        $item->delete();

        // Pāradresē uz kategoriju sarakstu ar veiksmes paziņojumu
        return redirect()->route('kategorijas.index')->with('success', 'Kategorija veiksmīgi izdzēsta.');
    }
}