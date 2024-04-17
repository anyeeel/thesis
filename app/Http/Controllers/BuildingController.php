<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Building;
use App\Models\Floor;
use App\Models\Room;


class BuildingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        // Fetch all buildings from the database
    $buildings = Building::orderBy('building_name')->paginate(8);
    
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

        for ($i = 1; $i <= $validatedData['num_of_floors']; $i++) {
            $floors = new Floor();
            $floors->building_id = $building->id;
            $floors->name = 'Floor ' . $i;
            $floors->save();
        }

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
    
        // Handle adding or removing floors
        $currentFloorCount = $building->floors()->count();
        $newFloorCount = $validatedData['num_of_floors'];
        if ($newFloorCount > $currentFloorCount) {
            // Add new floors
            for ($i = $currentFloorCount + 1; $i <= $newFloorCount; $i++) {
                $floor = new Floor();
                $floor->building_id = $building->id;
                $floor->name = 'Floor ' . $i;
                $floor->save();
            }
        } elseif ($newFloorCount < $currentFloorCount) {
            // Determine the number of floors to delete
            $floorsToDelete = $currentFloorCount - $newFloorCount;
        
            // Delete excess floors starting from the most recently added
            $building->floors()->orderBy('id', 'desc')->limit($floorsToDelete)->delete();
        }
    
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
    public function dashboard()
    {
        // Retrieve all buildings
        $buildings = Building::all();
    
        // Count the total number of buildings
        $totalBuildings = $buildings->count();
    
        // Prepare data for building energy consumption
        $buildingEnergyData = [];
    
        // Iterate over each building to calculate energy consumption for each floor
        foreach ($buildings as $building) {
            $floorsData = [];
            foreach ($building->floors as $floor) {
                $floorsData[$floor->name] = $floor->totalEnergy();
            }
            $buildingEnergyData[$building->building_name] = $floorsData;
        }
    
        // Pass data to the dashboard view
        return view('dashboard', compact('totalBuildings', 'buildingEnergyData'));

    }

    public function search(Request $request)
    {
        // Get the search query from the request
        $query = $request->input('query');
        
        // Perform the search query on the buildings table
        $buildings = Building::where('building_name', 'like', '%' . $query . '%')->paginate(8);
        
        // Return the search results as JSON
        return response()->json(['buildings' => $buildings]);
    }
    
    





    
    
}