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
                'quantity' => 'required|integer',
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
    
}