<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $this->check_permission("room.index");
        return view('app.room.index',[
            'rooms' => Room::all()
        ]);
    }

    public function create(){
        $this->check_permission("room.create");
        return view('app.room.form',[]);
    }

    public function store(Request $request)
    {
        $this->check_permission("room.store");
        $data = $request->validate([
            'name' => ['required'],
        ]);

        if($request->has("wheelchair")){
            $data['wheelchair'] = true;
        }else{
            $data['wheelchair'] = false;
        }

        $room = Room::create($data);

        return redirect()->route('room.edit', $room)->with('success', 'Room created successfully');
    }

    public function show(Room $room)
    {
        $this->check_permission("room.show");
        return redirect()->route('room.edit', $room);
    }

    public function edit(Room $room){
        return view('app.room.form',[
            'room' => $room
        ]);
    }

    public function update(Request $request, Room $room)
    {
        $this->check_permission("room.update");
        $data = $request->validate([
            'name' => ['required'],
        ]);
        if($request->has("wheelchair")){
            $data['wheelchair'] = true;
        }else{
            $data['wheelchair'] = false;
        }

        $room->update($data);

        return redirect()->route('room.edit', $room)->with('success', 'Room updated successfully');
    }

    public function destroy(Room $room)
    {
        $this->check_permission("room.delete");
        $room->delete();

        return redirect()->route('room.index')->with('success', 'Room deleted successfully');
    }
}
