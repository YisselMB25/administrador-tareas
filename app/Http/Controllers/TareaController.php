<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\TareaEstado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TareaController extends Controller
{
    public function index()
    {
        $tareas = Tarea::with('estado')
            ->where('user_id', Auth::id())
            ->orderBy('tareas_id', 'desc')
            ->get();
        return view('tareas.index', compact('tareas'));
    }

    public function create()
    {
        $estados = TareaEstado::all();
        return view('tareas.create', compact('estados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tareas_titulo' => 'required|string|max:255',
            'tareas_descripcion' => 'nullable|string',
            'estado_id' => 'required|exists:tareas_estados,estado_id',
            'tareas_fecha_limite' => 'nullable|date',
            'tareas_notas' => 'nullable|string',
        ]);

        Tarea::create([
            'tareas_titulo' => $request->tareas_titulo,
            'tareas_descripcion' => $request->tareas_descripcion,
            'estado_id' => $request->estado_id,
            'user_id' => Auth::id(),
            'tareas_fecha_limite' => $request->tareas_fecha_limite,
            'tareas_notas' => $request->tareas_notas,
        ]);

        return redirect()->route('tareas.index')->with('success', 'Tarea creada correctamente.');
    }

    public function show($id)
    {
        $tarea = Tarea::with('estado')->findOrFail($id);

        if ($tarea->user_id !== Auth::id()) {
            abort(403, 'No tienes permisos para ver esta tarea.');
        }

        return view('tareas.show', compact('tarea'));
    }

    public function edit($id)
    {
        $tarea = Tarea::findOrFail($id);

        if ($tarea->user_id !== Auth::id()) {
            abort(403, 'No tienes permisos para editar esta tarea.');
        }

        $estados = TareaEstado::all();
        return view('tareas.edit', compact('tarea', 'estados'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tareas_titulo' => 'required|string|max:255',
            'tareas_descripcion' => 'nullable|string',
            'estado_id' => 'required|exists:tareas_estados,estado_id',
            'tareas_fecha_limite' => 'nullable|date',
            'tareas_notas' => 'nullable|string',
        ]);

        $tarea = Tarea::findOrFail($id);

        if ($tarea->user_id !== Auth::id()) {
            abort(403, 'No tienes permisos para actualizar esta tarea.');
        }

        $tarea->update([
            'tareas_titulo' => $request->tareas_titulo,
            'tareas_descripcion' => $request->tareas_descripcion,
            'estado_id' => $request->estado_id,
            'tareas_fecha_limite' => $request->tareas_fecha_limite,
            'tareas_notas' => $request->tareas_notas,
        ]);

        return redirect()->route('tareas.index')->with('success', 'Tarea actualizada correctamente.');
    }

    public function destroy($id)
    {
        $tarea = Tarea::findOrFail($id);

        if ($tarea->user_id !== Auth::id()) {
            abort(403, 'No tienes permisos para eliminar esta tarea.');
        }

        $tarea->delete();

        return redirect()->route('tareas.index')->with('success', 'Tarea eliminada correctamente.');
    }

    public function dashboard()
    {
        $pendientes = Tarea::where('user_id', Auth::id())
            ->where('estado_id', 1)
            ->count();

        return view('dashboard', compact('pendientes'));
    }
}
