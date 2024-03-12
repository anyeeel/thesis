<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Floor;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $floor_id = $request->input('floor_id');
        $floor = Floor::where('id', $floor_id)->first();
        $rooms = Room::where('floor_id', $floor_id)->get();
        return view('rooms.index', ['floor' => $floor, 'rooms' => $rooms]);
    }


    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        dd ($request->all());
        $room = new Room();
        
        $room->name = $request->input('room_name');
        $room->floor_id = $request->input('floor_id'); 
        $room->save();

        return redirect()->route('rooms.index')->with('success', 'Room created successfully.');
    }

    public function show(Room $rooms)
    {
        return view('rooms.show', compact('rooms'));
    }

    public function edit(Room $rooms)
    {
        return view('rooms.edit', compact('rooms'));
    }

    public function update(Request $request, Room $rooms)
    {
        $building->update($request->all());
        return redirect()->route('rooms.index')->with('success','Room updated successfully');
    }

    public function destroy(Room $rooms)
    {
        $building->delete();
        return redirect()->route('rooms.index')->with('success','Room deleted successfully');
    }
}
