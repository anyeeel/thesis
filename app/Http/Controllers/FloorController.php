<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\Building;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    public function index(Request $request)
    {
        $buildingId = $request->input('buildingId');
        $building = Building::where('id', $buildingId)->first();
        // $floors = $building->floors;
        return view('floors.index', ['building' => $building]);
    }

    public function create()
    {
        return view('floors.create');
    }

    public function store(Request $request)
    {
        Building::create($request->all());
        return redirect()->route('floors.index')->with('success','Building created successfully.');
    }

    public function show(Building $building)
    {
        return view('floors.show', compact('building'));
    }

    public function edit(Building $building)
    {
        return view('floors.edit', compact('building'));
    }

    public function update(Request $request, Building $building)
    {
        $building->update($request->all());
        return redirect()->route('floors.index')->with('success','Building updated successfully');
    }

    public function destroy(Building $building)
    {
        $building->delete();
        return redirect()->route('floors.index')->with('success','Building deleted successfully');
    }
}
