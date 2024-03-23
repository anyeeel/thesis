<?php

    namespace App\Http\Controllers;
    
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Http\Request;
    use App\Models\Devices;
    use App\Models\Room;
    
    
    class DeviceController extends Controller
    {
        public function index(Request $request, $room_id)
        {
            
            $devices = Devices::where('room_id', $room_id)->get();
            return view('devices.index', ['room_id' => $room_id, 'devices' => $devices]);
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
                'installed_date' => 'required|date',
                'life_expectancy' => 'required|integer',
                'power' => 'required|integer',
                'hours_used' => 'required|integer',
            ]);
        
            // Calculate and set energy before storing
            

            $device = Devices::create($validatedData);
            $room_id = $request->input ('room_id');
        
            // Redirect back with success message or handle it in your preferred way
            return redirect()->route('devices.index', ['room_id' => $room_id])->with('success', 'Device added successfully!');
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
}