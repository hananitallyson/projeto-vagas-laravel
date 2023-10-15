<?php

namespace App\Http\Controllers;

use App\Models\Vaga;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VagaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $vagas = Vaga::all();
        return view('vagas.index', [
            'vagas' => $vagas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('vagas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'descricao' => 'required',
            'ativo' => 'required',
        ]);

        $vaga = new Vaga();
        $vaga->titulo = $validated['titulo'];
        $vaga->descricao = $validated['descricao'];
        $vaga->ativo = $validated['ativo'];
        $vaga->save();

        return redirect(route('vagas.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Vaga $vaga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vaga $vaga): View
    {
        return view('vagas.edit', [
            'vaga' => $vaga
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vaga $vaga)
    {
        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'descricao' => 'required',
            'ativo' => 'required',
        ]);

        $vaga->update($validated);

        return redirect(route('vagas.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vaga $vaga): RedirectResponse
    {
        $vaga->delete();

        return redirect(route('vagas.index'));
    }
}
