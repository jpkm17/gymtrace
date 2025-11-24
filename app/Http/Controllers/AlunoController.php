<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Plano;
use App\Models\Pagamento;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    // Exibir lista de alunos
    public function index()
    {
        $alunos = Aluno::with('plano')->orderBy('nome')->get();
        return view('alunos.index', compact('alunos'));
    }

    // Formulário de criação
    public function create()
    {
        $planos = Plano::where('ativo', true)->get();
        return view('alunos.create', compact('planos'));
    }

    // Salvar novo aluno
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:100',
            'data_nascimento' => 'required|date',
            'contato' => 'nullable|string|max:20',
            'email' => 'required|email|unique:alunos,email',
            'plano_id' => 'required|exists:planos,id',
            'status' => 'required|in:ativo,inativo,inadimplente'
        ]);

        // Define quem criou
        $validated['criado_por'] = auth()->id();

        // 1) Cria o aluno
        $aluno = Aluno::create($validated);

        // 2) Pega o plano do aluno
        $plano = Plano::find($validated['plano_id']);

        // 3) Cria o pagamento pendente vinculado ao aluno
        Pagamento::create([
            'aluno_id' => $aluno->id,
            'valor' => $plano->valor,
            'status' => 'pendente',
            'data_pagamento' => now(), // ou a data de vencimento do mês
        ]);

        return redirect()->route('alunos.index')->with('success', 'Aluno criado com sucesso! Pagamento pendente gerado automaticamente.');
    }


    // Formulário de edição
    public function edit($id)
    {
        $aluno = Aluno::findOrFail($id);
        $planos = Plano::where('ativo', true)->get();
        return view('alunos.edit', compact('aluno', 'planos'));
    }

    // Atualizar aluno
    public function update(Request $request, $id)
    {
        $aluno = Aluno::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'required|string|max:100',
            'data_nascimento' => 'required|date',
            'contato' => 'nullable|string|max:20',
            'email' => "required|email|unique:alunos,email,{$aluno->id}",
            'status' => 'required|string',
            'plano_id' => 'required|exists:planos,id'
        ]);

        $aluno->update($validated);

        return redirect()->route('alunos.index')->with('success', 'Aluno atualizado com sucesso!');
    }

    // Deletar aluno
    public function destroy($id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();

        return redirect()->route('alunos.index')->with('success', 'Aluno excluído com sucesso!');
    }
}
