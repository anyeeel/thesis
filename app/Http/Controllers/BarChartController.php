<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Devices;
use App\Models\Room;
use App\Models\Floor;
use App\Models\Building;

class BarChartController extends Controller
{
    public function index()
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
           // Get the total number of devices
           $totalDevices = Devices::sum('active_quantity');
           $buildingDeviceCounts = Building::with('floors.rooms.devices')
           ->get(['id', 'building_name'])
           ->mapWithKeys(function ($building) {
               return [$building->building_name => $building->floors->flatMap->rooms->flatMap->devices->groupBy('type')->map->count()];
           });
     
         // Pass data to the dashboard view
         return view('barchart', compact('totalBuildings', 'buildingEnergyData','buildingDeviceCounts'));
    }   
                 
}
    