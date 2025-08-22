@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 shadow-xl rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-gray-100 flex items-center">
            <span class="mr-2">➕</span> Nueva Tarea
        </h1>

        <form action="{{ route('tareas.store') }}" method="POST">
            @csrf
            
            <!-- Título -->
            <div class="mb-5">
                <label for="tareas_titulo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Título
                </label>
                <div class="mt-1">
                    <input type="text" name="tareas_titulo" id="tareas_titulo" required class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>
            </div>

            <!-- Descripción -->
            <div class="mb-5">
                <label for="tareas_descripcion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Descripción
                </label>
                <div class="mt-1">
                    <textarea name="tareas_descripcion" id="tareas_descripcion" rows="3" required class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white"></textarea>
                </div>
            </div>

            <!-- Estado -->
            <div class="mb-5">
                <label for="estado_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Estado
                </label>
                <div class="mt-1">
                    <select name="estado_id" id="estado_id" required class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        @foreach ($estados as $estado)
                            <option value="{{ $estado->estado_id }}">{{ $estado->estado_titulo }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Fecha límite -->
            <div class="mb-5">
                <label for="tareas_fecha_limite" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Fecha límite
                </label>
                <div class="mt-1">
                    <input type="date" name="tareas_fecha_limite" id="tareas_fecha_limite" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>
            </div>

            <!-- Notas -->
            <div class="mb-5">
                <label for="tareas_notas" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Notas (opcional)
                </label>
                <div class="mt-1">
                    <textarea name="tareas_notas" id="tareas_notas" rows="3" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white"></textarea>
                </div>
            </div>

            <!-- Botones -->
            <div class="flex justify-end gap-x-4">
                <a href="{{ route('tareas.index') }}" class="inline-flex justify-center rounded-md border border-transparent bg-gray-600 py-2 px-4 text-sm font-medium text-black shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-300">
                    ⬅️ Volver
                </a>
                <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-green-600 py-2 px-4 text-sm font-medium text-black shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-colors duration-300">
                    💾 Guardar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
