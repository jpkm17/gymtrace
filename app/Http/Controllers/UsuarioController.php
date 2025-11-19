<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Lista de usuários
    public function index()
    {
        $usuarios = Usuario::orderBy('nome')->get();
        return view('usuario.index', compact('usuarios'));
    }

    // Formulário de criação
    public function create()
    {
        return view('usuario.create');
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

        Usuario::create($validated);

        return redirect()->route('usuarios.index')->with('success', 'Usuário criado com sucesso!');
    }

    // Formulário de edição
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuario.edit', compact('usuario'));
    }

    // Atualizar usuário
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

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
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuário excluído com sucesso!');
    }
}
