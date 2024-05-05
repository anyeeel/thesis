<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Devices;
use App\Models\Room;
use App\Models\Floor;
use App\Models\Building;
use App\Models\EnergyMeterConsumption;
use App\Models\EnergyComputedConsumption;


class PiechartController extends Controller
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

            $meterConsumptions = EnergyMeterConsumption::pluck('consumption', 'date')->toArray();
            $computedConsumptions = EnergyComputedConsumption::pluck('computed_consumption', 'date')->toArray();
        
            $labels = array_keys($meterConsumptions); // Assuming both tables have same dates
            $meterData = array_values($meterConsumptions);
            $computedData = array_values($computedConsumptions);
            // Retrieve data for the pie chart (total energy consumption by device types)
            $deviceTypes = Devices::groupBy('type')
                ->selectRaw('type, SUM(active_quantity * power * hours_used / 1000) AS total_energy_consumption')
                ->get();
        
            // Prepare data for Chart.js
            $pieLabels = $deviceTypes->pluck('type');
            $pieData = $deviceTypes->pluck('total_energy_consumption');
        
            // Retrieve data for the pie chart (total energy consumption by device types)
            $device_types = Devices::groupBy('type')
                ->selectRaw('type, SUM(active_quantity + inactive_quantity) AS total_devices')  
                ->get();
        
            // Prepare data for Chart.js
            $polarLabels = $device_types->pluck('type');
            $polarData = $device_types->pluck('total_devices');
        
            // Calculate the overall total energy consumption
            $devices = Devices::all();
            $overallTotalEnergy = $devices->sum(function ($device) {
                return $device->active_quantity * $device->power * $device->hours_used / 1000;
            });
        
            // Get the total number of devices
            $totalDevices = Devices::sum('active_quantity');
            $buildingDeviceCounts = Building::with('floors.rooms.devices')
            ->get(['id', 'building_name'])
            ->mapWithKeys(function ($building) {
                return [$building->building_name => $building->floors->flatMap->rooms->flatMap->devices->groupBy('type')->map->count()];
            });

            return view('piechart')->with(compact('labels','totalBuildings', 'buildingEnergyData', 'meterData', 'computedData','pieLabels', 'pieData', 'polarLabels', 'polarData', 'overallTotalEnergy', 'totalDevices', 'buildingDeviceCounts'));
        }   
                 
}
