<?php

namespace App\Http\Controllers;

use App\Models\Notificacao;
use App\Models\Aluno;
use Illuminate\Http\Request;
use App\Mail\NotificacaoAlunoMail;
use Illuminate\Support\Facades\Mail;

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
        $request->validate([
            'aluno_id' => 'required',
            'mensagem' => 'required',
            'tipo' => 'required'
        ]);

        // Salva no banco
        $notificacao = Notificacao::create([
            'aluno_id' => $request->aluno_id,
            'mensagem' => $request->mensagem,
            'tipo' => $request->tipo,
        ]);

        // Enviar e-mail
        $aluno = Aluno::find($request->aluno_id);

        Mail::to($aluno->email)->send(
            new NotificacaoAlunoMail($request->mensagem)
        );

        return redirect()->route('notificacoes.index')
            ->with('success', 'Notificação enviada e registrada.');
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
