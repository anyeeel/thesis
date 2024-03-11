<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Floor;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Building::all();
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        Building::create($request->all());
        return redirect()->route('rooms.index')->with('success','Building created successfully.');
    }

    public function show(Building $building)
    {
        return view('rooms.show', compact('building'));
    }

    public function edit(Building $building)
    {
        return view('rooms.edit', compact('building'));
    }

    public function update(Request $request, Building $building)
    {
        $building->update($request->all());
        return redirect()->route('rooms.index')->with('success','Building updated successfully');
    }

    public function destroy(Building $building)
    {
        $building->delete();
        return redirect()->route('rooms.index')->with('success','Building deleted successfully');
    }
}
