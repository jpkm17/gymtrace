<?php

namespace App\Http\Controllers;

use App\Models\Presenca;
use App\Models\Aluno;
use App\Models\Usuario;
use Illuminate\Http\Request;

class PresencaController extends Controller
{
    // Exibir lista de presenças
    public function index()
    {
        $presencas = Presenca::with(['aluno', 'instrutor'])
            ->orderByDesc('data_presenca')
            ->get();

        return view('presencas.index', compact('presencas'));
    }

    // Formulário de criação
    public function create()
    {
        $alunos = Aluno::orderBy('nome')->get();
        $instrutores = Usuario::where('perfil', 'instrutor')->orderBy('nome')->get();

        return view('presencas.create', compact('alunos', 'instrutores'));
    }

    // Salvar nova presença
    public function store(Request $request)
    {
        $validated = $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'instrutor_id' => 'required|exists:usuarios,id',
            'data_presenca' => 'required|date'
        ]);

        Presenca::create($validated);

        return redirect()->route('presencas.index')->with('success', 'Presença registrada com sucesso!');
    }

    // Formulário de edição
    public function edit($id)
    {
        $presenca = Presenca::findOrFail($id);
        $alunos = Aluno::orderBy('nome')->get();
        $instrutores = Usuario::where('perfil', 'instrutor')->orderBy('nome')->get();

        return view('presencas.edit', compact('presenca', 'alunos', 'instrutores'));
    }

    // Atualizar presença
    public function update(Request $request, $id)
    {
        $presenca = Presenca::findOrFail($id);

        $validated = $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'instrutor_id' => 'required|exists:usuarios,id',
            'data_presenca' => 'required|date'
        ]);

        $presenca->update($validated);

        return redirect()->route('presencas.index')->with('success', 'Presença atualizada com sucesso!');
    }

    // Deletar presença
    public function destroy($id)
    {
        $presenca = Presenca::findOrFail($id);
        $presenca->delete();

        return redirect()->route('presencas.index')->with('success', 'Presença excluída com sucesso!');
    }
}
