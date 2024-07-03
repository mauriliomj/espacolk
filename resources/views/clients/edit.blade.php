<!-- resources/views/clients/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Atualizar Cliente
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Formulário de atualização -->
                    <form id="update-client-form">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nome:</label>
                            <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $client->name }}">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                            <input type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $client->email }}">
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Telefone:</label>
                            <input type="text" name="phone" id="phone" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $client->phone }}">
                        </div>
                        <div class="mb-4">
                            <label for="birth_date" class="block text-gray-700 text-sm font-bold mb-2">Data de Nascimento:</label>
                            <input type="date" name="birth_date" id="birth_date" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $client->birth_date }}">
                        </div>
                        <div class="mb-4">
                            <label for="observations" class="block text-gray-700 text-sm font-bold mb-2">Observações:</label>
                            <textarea name="observations" id="observations" class="form-input rounded-md shadow-sm mt-1 block w-full">{{ $client->observations }}</textarea>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button id="update-button">
                                Atualizar
                            </x-primary-button>
                        </div>
                    </form>

                    <!-- Mensagem de sucesso -->
                    <div id="success-message" class="mt-4 hidden bg-green-500 text-green font-bold py-2 px-4 rounded">
                        Alterações salvas com sucesso!
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        document.getElementById('update-client-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const form = event.target;
            const formData = new FormData(form);

            fetch("{{ route('clients.update', $client) }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': formData.get('_token'),
                    'X-HTTP-Method-Override': 'PUT'
                },
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro na resposta da rede.');
                }
                return response.json();
            })
            .then(data => {
                if (data.message) {
                    document.getElementById('success-message').classList.remove('hidden');
                    document.getElementById('success-message').innerText = data.message;
                }
            })
            .catch(error => console.error('Erro:', error));
        });
    </script>
</x-app-layout>
