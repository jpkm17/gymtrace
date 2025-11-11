<?php

namespace App\Http\Controllers;

use App\Models\Pagamento;
use App\Models\Aluno;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    // Exibir lista de pagamentos
    public function index()
    {
        $pagamentos = Pagamento::with('aluno')->orderByDesc('data_pagamento')->get();
        return view('pagamentos.index', compact('pagamentos'));
    }

    // Formulário de criação
    public function create()
    {
        $alunos = Aluno::orderBy('nome')->get();
        return view('pagamentos.create', compact('alunos'));
    }

    // Salvar novo pagamento
    public function store(Request $request)
    {
        $validated = $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'data_pagamento' => 'required|date',
            'valor' => 'required|numeric|min:0',
            'status' => 'required|string|in:pago,pendente,atrasado'
        ]);

        Pagamento::create($validated);

        return redirect()->route('pagamentos.index')->with('success', 'Pagamento registrado com sucesso!');
    }

    // Formulário de edição
    public function edit($id)
    {
        $pagamento = Pagamento::findOrFail($id);
        $alunos = Aluno::orderBy('nome')->get();
        return view('pagamentos.edit', compact('pagamento', 'alunos'));
    }

    // Atualizar pagamento
    public function update(Request $request, $id)
    {
        $pagamento = Pagamento::findOrFail($id);

        $validated = $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'data_pagamento' => 'required|date',
            'valor' => 'required|numeric|min:0',
            'status' => 'required|string|in:pago,pendente,atrasado'
        ]);

        $pagamento->update($validated);

        return redirect()->route('pagamentos.index')->with('success', 'Pagamento atualizado com sucesso!');
    }

    // Deletar pagamento
    public function destroy($id)
    {
        $pagamento = Pagamento::findOrFail($id);
        $pagamento->delete();

        return redirect()->route('pagamentos.index')->with('success', 'Pagamento excluído com sucesso!');
    }
}
