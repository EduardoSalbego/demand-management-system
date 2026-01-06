<?php

namespace App\Http\Controllers;

use App\Models\Demanda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemandaController extends Controller
{
    public function index()
    {
        $demandas = Demanda::where('user_id', Auth::id())
                            ->latest()
                            ->paginate(10);

        return view('demandas.index', compact('demandas'));
    }

    public function create()
    {
        return view('demandas.create');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'titulo' => 'required|min:5|max:255',
            'descricao' => 'required|min:10',
            'data_entrega' => 'required|date|after:+48 hours',
        ], [
            'titulo.required' => 'O campo Título é obrigatório.',
            'titulo.min' => 'O título deve ter pelo menos 5 caracteres.',
            
            'descricao.required' => 'O campo Descrição é obrigatório.',
            'descricao.min' => 'A descrição deve ter pelo menos 10 caracteres.',
            
            'data_entrega.required' => 'A Data de Entrega é obrigatória.',
            'data_entrega.date' => 'Formato de data inválido.',
            'data_entrega.after' => 'A data deve ser para daqui a pelo menos 48 horas.',
        ]);

        Demanda::create([
            'user_id' => Auth::id(),
            'titulo' => $dados['titulo'],
            'descricao' => $dados['descricao'],
            'data_entrega' => $dados['data_entrega'],
            'status' => 1, // 1 = Aberto
        ]);

        return redirect()->route('demandas.index')->with('success', 'Demanda criada com sucesso!');
    }

    public function edit(Demanda $demanda)
    {
        if ($demanda->user_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para editar esta demanda.');
        }

        return view('demandas.edit', compact('demanda'));
    }

    public function update(Request $request, Demanda $demanda)
    {
        if ($demanda->user_id !== Auth::id()) {
            abort(403);
        }

        $dados = $request->validate([
            'titulo' => 'required|min:5|max:255',
            'descricao' => 'required|min:10',
            'data_entrega' => 'required|date|after:+48 hours',
        ]);

        $demanda->update($dados);

        return redirect()->route('demandas.index')->with('success', 'Demanda atualizada com sucesso!');
    }

    public function destroy(Demanda $demanda)
    {
        if ($demanda->user_id !== Auth::id()) {
            abort(403);
        }

        $demanda->delete();

        return redirect()->route('demandas.index')->with('success', 'Demanda removida com sucesso!');
    }
}