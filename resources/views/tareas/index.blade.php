@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-gray-100">
            📋 Lista de Tareas
        </h1>

        <div class="flex justify-start mb-6">
            <a href="{{ route('tareas.create') }}" class="inline-block bg-blue-600 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-700 transition-colors duration-300">
                ➕ Nueva Tarea
            </a>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Título</th>
                        <th scope="col" class="px-6 py-3">Estado</th>
                        <th scope="col" class="px-6 py-3">Fecha Límite</th>
                        <th scope="col" class="px-6 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tareas as $tarea)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $tarea->tareas_id }}
                            </td>
                            <td class="px-6 py-4">{{ $tarea->tareas_titulo }}</td>
                            <td class="px-6 py-4">{{ $tarea->estado->estado_titulo }}</td>
                            <td class="px-6 py-4">
                                {{ $tarea->tareas_fecha_limite ? \Carbon\Carbon::parse($tarea->tareas_fecha_limite)->format('d/m/Y') : '-' }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('tareas.show', $tarea->tareas_id) }}" class="inline-block font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2">👁️ Ver</a>
                                <a href="{{ route('tareas.edit', $tarea->tareas_id) }}" class="inline-block font-medium text-yellow-500 dark:text-yellow-400 hover:underline mr-2">✏️ Editar</a>
                                <form action="{{ route('tareas.destroy', $tarea->tareas_id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">🗑️ Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white dark:bg-gray-900">
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">No hay tareas registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
