<!-- resources/views/clients/search.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Buscar Cliente
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Formulário de busca -->
                    <form action="{{ route('clients.search') }}" method="GET">
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nome do Cliente:</label>
                            <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full" placeholder="Digite o nome do cliente">
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                Buscar
                            </x-primary-button>
                        </div>
                    </form>

                    <!-- Resultados da busca -->
                    @if(isset($clients))
                        <div class="mt-6">
                            @if($clients->isEmpty())
                                <p class="text-gray-600">Nenhum cliente encontrado com o nome "{{ request('name') }}".</p>
                            @else
                                <table class="min-w-full bg-white mt-6">
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
                                                    <div class="flex space-x-2">
                                                        <a href="{{ route('clients.edit', $client) }}" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded">
                                                        Atualizar
                                                        </a>
                                                        <form action="{{ route('clients.delete', $client) }}" method="POST" class="inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 rounded">
                                                                Deletar
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
