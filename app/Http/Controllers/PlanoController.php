<?php

namespace App\Http\Controllers;

use App\Models\Plano;
use Illuminate\Http\Request;

class PlanoController extends Controller
{
    // Exibir lista de planos
    public function index()
    {
        $planos = Plano::orderBy('descricao')->get();
        return view('planos.index', compact('planos'));
    }

    // Formulário de criação
    public function create()
    {
        return view('planos.create');
    }

    // Salvar novo plano
    public function store(Request $request)
    {
        $validated = $request->validate([
            'descricao' => 'required|string|max:100',
            'duracao_dias' => 'required|integer|min:1',
            'valor' => 'required|numeric|min:0',
            'ativo' => 'required|boolean'
        ]);

        Plano::create($validated);

        return redirect()->route('planos.index')->with('success', 'Plano cadastrado com sucesso!');
    }

    // Formulário de edição
    public function edit($id)
    {
        $plano = Plano::findOrFail($id);
        return view('planos.edit', compact('plano'));
    }

    // Atualizar plano
    public function update(Request $request, $id)
    {
        $plano = Plano::findOrFail($id);

        $validated = $request->validate([
            'descricao' => 'required|string|max:100',
            'duracao_dias' => 'required|integer|min:1',
            'valor' => 'required|numeric|min:0',
            'ativo' => 'required|boolean'
        ]);

        $plano->update($validated);

        return redirect()->route('planos.index')->with('success', 'Plano atualizado com sucesso!');
    }

    // Excluir plano
    public function destroy($id)
    {
        $plano = Plano::findOrFail($id);
        $plano->delete();

        return redirect()->route('planos.index')->with('success', 'Plano excluído com sucesso!');
    }
}
