<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Building;
use App\Models\Floor;

class BuildingController extends Controller
{
    public function index()
    {
        // Fetch all buildings from the database
        $buildings = Building::all();
        
        // Pass the buildings data to the index view
        return view('buildings.index', compact('buildings'));
    }

    public function create()
    {
        // Your create method logic
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'building_name' => 'required|string|max:255',
            'num_of_floors' => 'required|integer|min:1',
        ]);

        // Create a new Building instance with the validated data
        $building = Building::create($validatedData);

        // Optionally, you can return a response or redirect to another page
        return redirect()->route('buildings.index')->with('success', 'Building added successfully');
    }

    public function show($buildingName)
    {
        
        $building = Building::where('building_name', $buildingName)->firstOrFail();

        return view('floors.index', compact('building'));
    }
    

    public function edit($id)
    {
        // Find the building by its ID
        $building = Building::findOrFail($id);
    
        // Return the view for editing the building and pass the $building variable
        return view('buildings.edit', compact('building'));
    }
    

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'building_name' => 'required|string|max:255',
            'num_of_floors' => 'required|integer|min:1',
        ]);

        // Find the building by its ID
        $building = Building::findOrFail($id);

        // Update the building with the validated data
        $building->update($validatedData);

        // Redirect back with a success message
        return redirect()->route('buildings.index')->with('success', 'Building updated successfully');
    }

    public function destroy($id)
    {
        // Find the building by its ID
        $building = Building::findOrFail($id);

        // Delete the building
        $building->delete();

        // Redirect back with a success message
        return redirect()->route('buildings.index')->with('success', 'Building deleted successfully');
    }

    // Other methods like store, show, edit, update, destroy, etc.
}
