<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index()
    {
        $devices = Building::all();
        return view('devices.index', compact('devices'));
    }

    public function create()
    {
        return view('devices.create');
    }

    public function store(Request $request)
    {
        Building::create($request->all());
        return redirect()->route('devices.index')->with('success','Building created successfully.');
    }

    public function show(Building $building)
    {
        return view('devices.show', compact('building'));
    }

    public function edit(Building $building)
    {
        return view('devices.edit', compact('building'));
    }

    public function update(Request $request, Building $building)
    {
        $building->update($request->all());
        return redirect()->route('devices.index')->with('success','Building updated successfully');
    }

    public function destroy(Building $building)
    {
        $building->delete();
        return redirect()->route('devices.index')->with('success','Building deleted successfully');
    }
}
