<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-200">
            📌 Mis Tareas
        </h2>

        @if($tareas->count() > 0)
            <div class="bg-gray-50 dark:bg-gray-900 p-6 rounded-lg shadow">
                <table class="table-auto w-full border-collapse">
                    <thead class="bg-gray-200 dark:bg-gray-700">
                        <tr>
                            <th class="px-4 py-2 text-left">Título</th>
                            <th class="px-4 py-2 text-left">Estado</th>
                            <th class="px-4 py-2 text-left">Creada</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tareas as $tarea)
                            <tr class="border-b dark:border-gray-600">
                                <td class="px-4 py-2">{{ $tarea->titulo }}</td>
                                <td class="px-4 py-2">
                                    <span class="px-2 py-1 rounded text-sm
                                        @if($tarea->estado_id == 1) bg-yellow-200 text-yellow-800
                                        @elseif($tarea->estado_id == 2) bg-green-200 text-green-800
                                        @else bg-gray-200 text-gray-800 @endif">
                                        {{ $tarea->estado->estado_titulo ?? 'Sin estado' }}
                                    </span>
                                </td>
                                <td class="px-4 py-2">{{ $tarea->created_at->format('d/m/Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="p-6 bg-gray-100 dark:bg-gray-700 rounded-lg">
                <p class="text-gray-600 dark:text-gray-300">No tienes tareas aún.</p>
            </div>
        @endif

    </div>
</div>
