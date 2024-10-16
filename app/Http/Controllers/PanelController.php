<?php

namespace App\Http\Controllers;

use App\Jobs\UpdateScreensJob;
use App\Models\Panel;
use App\Models\Room;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index()
    {
        $this->check_permission("panel.index");
       $panels = Panel::all();
       return view('app.panel.index', [
           'panels' => $panels
       ]);
    }

    public function create(){
        $this->check_permission("panel.create");
        return view('app.panel.form', [
            "rooms" => Room::all(),
        ]);
    }

    public function store(Request $request)
    {
        $this->check_permission("panel.store");
        $data = $request->validate([
            'title' => ['required'],
            'room_id' => ['required'],
            'description' => ['nullable'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
            'type' => ['nullable'],
            'host' => ['nullable'],
        ]);

        $panel = Panel::create($data);
        UpdateScreensJob::dispatch();

        return redirect()->route('panel.edit', $panel->id)
        ->with('success', 'Panel created successfully.');
    }

    public function show(Panel $panel)
    {
        return redirect()->route("panel.edit", $panel);
    }
    public function edit(Panel $panel){
        $this->check_permission("panel.edit");
        return view('app.panel.form', [
            "panel" => $panel,
            "rooms" => Room::all(),
        ]);
    }

    public function update(Request $request, Panel $panel)
    {
        $data = $request->validate([
            'title' => ['required'],
            'room_id' => ['required'],
            'description' => ['nullable'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
            'type' => ['nullable'],
            'host' => ['nullable'],
        ]);

        $panel->update($data);

        UpdateScreensJob::dispatch();

        return redirect()->route('panel.edit', $panel->id)
            ->with('success', 'Panel updated successfully.');
    }

    public function destroy(Panel $panel)
    {
        $panel->delete();

        return response()->json();
    }
}
