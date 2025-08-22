@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-gray-100">
            👁️ Descripción de la Tarea
        </h1>

        <div class="space-y-4 text-gray-800 dark:text-gray-200">
            <p><strong class="font-semibold">Título:</strong> {{ $tarea->tareas_titulo }}</p>
            <p><strong class="font-semibold">Descripción:</strong> {{ $tarea->tareas_descripcion }}</p>
            <p><strong class="font-semibold">Estado:</strong> {{ $tarea->estado->estado_titulo }}</p>
            <p><strong class="font-semibold">Fecha Límite:</strong> 
                {{ $tarea->tareas_fecha_limite ? \Carbon\Carbon::parse($tarea->tareas_fecha_limite)->format('d/m/Y') : '-' }}
            </p>
            <p><strong class="font-semibold">Notas:</strong> {{ $tarea->tareas_notas ?? '-' }}</p>
        </div>

        <div class="mt-8">
            <a href="{{ route('tareas.index') }}" class="inline-block bg-gray-600 text-white font-bold py-2 px-4 rounded-md hover:bg-gray-700 transition-colors duration-300">
                ⬅️ Volver
            </a>
        </div>
    </div>
</div>
@endsection
