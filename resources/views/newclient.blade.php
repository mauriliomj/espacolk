<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Espaço LK') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Bem vindo ao Espaço LK!") }}
                </div>

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="/submit">
                        @csrf
                        <div>
                            <label for="field1" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Field 1</label>
                            <input type="text" id="field1" name="field1" class="mt-1 block w-full" required>
                        </div>

                        <div class="mt-4">
                            <label for="field2" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Field 2 (Email)</label>
                            <input type="email" id="field2" name="field2" class="mt-1 block w-full" required>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 disabled:opacity-25 transition">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
