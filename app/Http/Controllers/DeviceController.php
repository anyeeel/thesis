<?php

    namespace App\Http\Controllers;
    
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Http\Request;
    use App\Models\Devices;
    use App\Models\Room;
    use App\Models\Floor;
    use App\Models\Building;
    
    
    class DeviceController extends Controller
    {
        public function index(Request $request, $room_id)
        {
            $devices = Devices::where('room_id', $room_id)->get();
            $room = Room::where('id', $room_id)->get();

            $floorId = Room::where('id', $room_id)->pluck('floor_id')->first();
            $floor = Floor::where('id', $floorId)->get();

            $buildingId = Floor::where('id', $floorId)->pluck('building_id')->first();
            $building = Building::where('id', $buildingId)->get();

    
            // Check if a search query is submitted
    if ($request->has('query')) {
        $searchTerm = $request->input('query');
        $devices->where(function ($query) use ($searchTerm) {
            $query->where('type', 'like', '%' . $searchTerm . '%')
                ->orWhere('name', 'like', '%' . $searchTerm . '%')
                ->orWhere('mode', 'like', '%' . $searchTerm . '%')
                ->orWhere('brand', 'like', '%' . $searchTerm . '%');
        });
    }


 
            return view('devices.index', ['room_id' => $room_id, 'devices' => $devices, 'room' => $room, 'floorId' => $floorId, 'floor'=> $floor, 'buildingId' => $buildingId, 'building'=> $building]);
        }
    
       

        public function store(Request $request)
        {
            // Validate incoming request data
            $validatedData = $request->validate([
                'room_id' => 'required|exists:rooms,id',
                'name' => 'required|string',
                'type' => 'required|string',
                'active_quantity' => 'required|integer',
                'inactive_quantity' => 'required|integer',
                'brand' => 'required|string',
                'model' => 'required|string',
                'installed_date' => 'nullable|date',
                'life_expectancy' => 'nullable|integer',
                'power' => 'required|numeric', // Updated to allow decimal values
                'hours_used' => 'required|numeric', // Updated to allow decimal values
            ]);
        
            // Create the device
            $device = Devices::create($validatedData);
        
            // Check if the device was created successfully
            if ($device) {
                // Redirect back to the devices index page with a success message
                return redirect()->route('devices.index', ['room_id' => $validatedData['room_id']])->with('success', 'Device added successfully!');
            } else {
                // Redirect back with an error message
                return redirect()->back()->with('error', 'Failed to add device. Please try again.');
            }
        }
        
    
        public function show(Devices $device)
        {
            return view('devices.show', compact('device'));
        }

        public function edit(Devices $device)
        {
            return view('devices.edit', compact('device'));
        }

        public function update(Request $request, Devices $device)
        {
            $device->update($request->all());
            return redirect()->route('devices.index', ['room_id' => $device->room_id])->with('success','Device updated successfully');
        }

        
        public function destroy($id)
        {
            $device = Devices::findOrFail($id);
            $room_id = $device->room_id;
            $device->delete();
            return redirect()->route('devices.index', ['room_id' => $room_id])->with('success','Device deleted successfully');
        }

        public function dashboard()
        {
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

            
        
            return view('dashboard')->with(compact('pieLabels', 'pieData', 'polarLabels', 'polarData', 'overallTotalEnergy', 'totalDevices', 'buildingDeviceCounts'));
        }
         
                 
}