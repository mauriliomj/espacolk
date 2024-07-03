<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Clientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-4">
                            <ul class="list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="GET" action="{{ route('clients.index') }}">
                        <div class="mb-4">
                            <label for="per_page" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Clientes por página:</label>
                            <input type="number" id="per_page" name="per_page" class="mt-1 block w-full" value="{{ request()->input('per_page', 10) }}">
                        </div>
                        <div class="mb-4">
                            <x-primary-button class="ms-3" type="submit">
                                {{ __('Aplicar') }}
                            </x-primary-button>
                        </div>
                    </form>

                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="border-b">Nome</th>
                                <th class="border-b">Email</th>
                                <th class="border-b">Telefone</th>
                                <th class="border-b">Data de Nascimento</th>
                                <th class="border-b">Observações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td class="border-b">{{ $client->name }}</td>
                                    <td class="border-b">{{ $client->email }}</td>
                                    <td class="border-b">{{ $client->phone }}</td>
                                    <td class="border-b">{{ $client->birth_date }}</td>
                                    <td class="border-b">{{ $client->observations }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $clients->appends(['per_page' => $clients->perPage()])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
