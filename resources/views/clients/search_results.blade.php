<!-- resources/views/clients/search_results.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Resultados da Busca
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($clients->isEmpty())
                        <p>Nenhum cliente encontrado com o nome "{{ request('name') }}".</p>
                    @else
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2">Nome</th>
                                    <th class="py-2">Email</th>
                                    <th class="py-2">Telefone</th>
                                    <th class="py-2">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <td class="py-2">{{ $client->name }}</td>
                                        <td class="py-2">{{ $client->email }}</td>
                                        <td class="py-2">{{ $client->phone }}</td>
                                        <td class="py-2">
                                            <a href="{{ route('clients.edit', $client) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Atualizar</a>
                                            <form action="{{ route('clients.delete', $client) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                    Deletar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
