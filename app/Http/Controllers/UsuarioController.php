<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Lista de usuários
    public function index()
    {
        $usuarios = User::orderBy('nome')->get();
        return view('usuarios.index', compact('usuarios'));
    }

    // Formulário de criação
    public function create()
    {
        return view('usuarios.create');
    }

    // Salvar novo usuário
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:100',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|min:6|confirmed',
            'perfil' => 'required|in:administrador,instrutor'
        ]);

        User::create($validated);

        return redirect()->route('usuarios.index')->with('success', 'Usuário criado com sucesso!');
    }

    // Formulário de edição
    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    // Atualizar usuário
    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'required|string|max:100',
            'email' => 'required|email|unique:usuarios,email,' . $id,
            'senha' => 'nullable|min:6|confirmed',
            'perfil' => 'required|in:administrador,instrutor'
        ]);

        if (!empty($validated['senha'])) {
            $validated['senha'] = bcrypt($validated['senha']);
        } else {
            unset($validated['senha']);
        }

        $usuario->update($validated);

        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    // Excluir usuário
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuário excluído com sucesso!');
    }
}
