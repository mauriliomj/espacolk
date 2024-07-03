<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:clients,name',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'birth_date' => 'required|date',
            'observations' => 'nullable|string',
        ]);

        Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'birth_date' => $request->birth_date,
            'observations' => $request->observations,
        ]);

        return redirect()->route('newclient')->with('success', 'Cliente registrado com sucesso!');
    }

    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Padrão de 10 clientes por página
        $clients = Client::paginate($perPage);
        return view('clients.index', compact('clients'));
    }

    public function show(Request $request)
    {
        $clientId = $request->query('id');
        $client = Client::find($clientId);
        return view('clients.show', compact('client'));
    }

    public function searchByName(Request $request)
    {
        $name = $request->input('name');
        $clients = collect(); // Coletar clientes apenas quando uma busca for realizada
    
        if ($name) {
            // Buscar clientes com nome que contenham a string fornecida, independentemente de maiúsculas/minúsculas
            $clients = Client::where('name', 'LIKE', '%' . $name . '%')->get();
        }
    
        return view('clients.search', compact('clients'));
    }

    public function delete(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.search')->with('success', 'Cliente deletado com sucesso!');
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'birth_date' => 'required|date',
            'observations' => 'nullable|string',
        ]);

        $client->update($request->all());

        return response()->json(['message' => 'Alterações salvas com sucesso!']);    }
}   
