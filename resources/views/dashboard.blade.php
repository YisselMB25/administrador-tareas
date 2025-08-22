<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- Contenido de la tarjeta de bienvenida --}}
                    <div class="flex justify-center">
                        <div class="w-full md:w-1/2 p-6 bg-white dark:bg-gray-900  text-center">
                            <h3 class="text-2xl font-semibold mb-4 text-gray-800 dark:text-gray-100">
                                Bienvenido al Gestor de Tareas
                            </h3>
                            <p class="mb-6 text-gray-600 dark:text-gray-300">
                                Aquí puedes ver un resumen de tus tareas.
                            </p>

                            <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded-lg relative mb-6">
                                📌 Tareas pendientes: <strong>{{ $pendientes ?? 0 }}</strong>
                            </div>

                            <a href="{{ route('tareas.index') }}" class="inline-block bg-gray-800 text-white font-bold py-2 px-4 rounded-md hover:bg-gray-700 transition-colors duration-300">
                                Ver todas las tareas
                            </a>
                        </div>
                    </div>
                    {{-- Fin contenido de la tarjeta de bienvenida --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
