<?php

namespace App\Http\Controllers;

use App\Models\Panel;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index()
    {
        return Panel::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required'],
            'room_id' => ['required'],
            'description' => ['nullable'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
        ]);

        return Panel::create($data);
    }

    public function show(Panel $panel)
    {
        return $panel;
    }

    public function update(Request $request, Panel $panel)
    {
        $data = $request->validate([
            'title' => ['required'],
            'room_id' => ['required'],
            'description' => ['nullable'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
        ]);

        $panel->update($data);

        return $panel;
    }

    public function destroy(Panel $panel)
    {
        $panel->delete();

        return response()->json();
    }
}
