<?php

namespace App\Http\Controllers;

use App\Models\Producte;
use App\Models\Llista;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProducteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'quantitat' => 'nullable|integer|min:1',
            'llista_id' => 'required|exists:llistas,id',
        ]);

        Producte::create([
            'nom' => $request->nom,
            'quantitat' => $request->quantitat ?? 1, 
            'llista_id' => $request->llista_id,
        ]);

        return back()->with('success', 'Producte afegit!');
    }

    public function update(Request $request, $id)
    {
        $producte = Producte::findOrFail($id);

        $request->validate([
            'nom' => 'required|string|max:255',
            'quantitat' => 'required|integer|min:1',
            'categoria_id' => 'nullable|exists:categories,id',
        ]);

        $producte->update([
            'nom' => $request->nom,
            'quantitat' => $request->quantitat,
            'categoria_id' => $request->categoria_id,
        ]);

        return redirect()->route('llistas.show', $producte->llista_id)
                         ->with('success', 'Producte actualitzat correctament!');
    }

    public function toggleComprat($id)
    {
        $producte = Producte::findOrFail($id);

        // 🔥 Cambiar el valor manualmente
        $producte->comprat = !$producte->comprat;
        $producte->save();

        // 🔥 Redirigir SIEMPRE a la lista donde está el producto
        return redirect()->route('llistas.show', $producte->llista_id)
                         ->with('success', 'Producte actualitzat!');
    }

    public function destroy(Request $request, $id)
    {
        $producte = Producte::findOrFail($id);
        $llistaId = $producte->llista_id;

        $producte->delete();

        return redirect()->route('llistas.show', $llistaId)
                         ->with('success', 'Producte eliminat correctament!');
    }
}
