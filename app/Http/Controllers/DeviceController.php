<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Devices;
use App\Models\Room;


class DeviceController extends Controller
{
    public function index(Request $request, $room_id)
    {
        // Fetch devices for the specified room ID
        $devices = Devices::where('room_id', $room_id)->get();

        // Pass the devices data to the view for display
        return view('devices.index', compact('devices'));
    }

}
