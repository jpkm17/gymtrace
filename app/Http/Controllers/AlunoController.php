<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Plano;
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
            'status' => 'required|string',
            'plano_id' => 'required|exists:planos,id'
        ]);

        $validated['criado_por'] = auth()->id() ?? 1; // Exemplo

        Aluno::create($validated);

        return redirect()->route('alunos.index')->with('success', 'Aluno cadastrado com sucesso!');
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
