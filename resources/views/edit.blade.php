<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Atualizar Cliente') }}
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

                    <form method="POST" action="{{ route('clients.update', $client) }}">
                        @csrf
                        @method('PATCH')

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome:</label>
                            <input type="text" id="name" name="name" class="mt-1 block w-full" value="{{ $client->name }}">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email:</label>
                            <input type="email" id="email" name="email" class="mt-1 block w-full" value="{{ $client->email }}">
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Telefone:</label>
                            <input type="text" id="phone" name="phone" class="mt-1 block w-full" value="{{ $client->phone }}">
                        </div>
                        <div class="mb-4">
                            <label for="birth_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data de Nascimento:</label>
                            <input type="date" id="birth_date" name="birth_date" class="mt-1 block w-full" value="{{ $client->birth_date }}">
                        </div>
                        <div class="mb-4">
                            <label for="observations" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Observações:</label>
                            <textarea id="observations" name="observations" class="mt-1 block w-full">{{ $client->observations }}</textarea>
                        </div>
                        <div class="mb-4">
                            <x-primary-button class="ms-3" type="submit">
                                {{ __('Salvar') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
