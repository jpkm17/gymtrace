<?php

namespace App\Http\Controllers;

use App\Models\Notificacao;
use App\Models\Aluno;
use Illuminate\Http\Request;

class NotificacaoController extends Controller
{
    // Exibir todas as notificações
    public function index()
    {
        $notificacoes = Notificacao::with('aluno')
            ->orderByDesc('data_envio')
            ->get();

        return view('notificacoes.index', compact('notificacoes'));
    }

    // Formulário de criação
    public function create()
    {
        $alunos = Aluno::orderBy('nome')->get();
        return view('notificacoes.create', compact('alunos'));
    }

    // Salvar nova notificação
    public function store(Request $request)
    {
        $validated = $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'mensagem' => 'required|string|min:5',
            'tipo' => 'required|in:vencimento,pagamento,lembrete',
            'data_envio' => 'required|date'
        ]);

        Notificacao::create($validated);

        return redirect()->route('notificacoes.index')->with('success', 'Notificação criada com sucesso!');
    }

    // Formulário de edição
    public function edit($id)
    {
        $notificacao = Notificacao::findOrFail($id);
        $alunos = Aluno::orderBy('nome')->get();

        return view('notificacoes.edit', compact('notificacao', 'alunos'));
    }

    // Atualizar notificação
    public function update(Request $request, $id)
    {
        $notificacao = Notificacao::findOrFail($id);

        $validated = $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'mensagem' => 'required|string|min:5',
            'tipo' => 'required|in:vencimento,pagamento,lembrete',
            'data_envio' => 'required|date'
        ]);

        $notificacao->update($validated);

        return redirect()->route('notificacoes.index')->with('success', 'Notificação atualizada com sucesso!');
    }

    // Excluir notificação
    public function destroy($id)
    {
        $notificacao = Notificacao::findOrFail($id);
        $notificacao->delete();

        return redirect()->route('notificacoes.index')->with('success', 'Notificação excluída com sucesso!');
    }
}
