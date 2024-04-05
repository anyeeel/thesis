<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnergyMeterConsumption;
use App\Models\EnergyComputedConsumption;

class EnergyConsumptionController extends Controller
{
    public function index()
    {
        $meterConsumptions = EnergyMeterConsumption::all();
        $computedConsumptions = EnergyComputedConsumption::all();
        
        return view('energy.index', compact('meterConsumptions', 'computedConsumptions'));
    }

    public function dashboard()
{
    $meterConsumptions = EnergyMeterConsumption::pluck('consumption', 'date')->toArray();
    $computedConsumptions = EnergyComputedConsumption::pluck('computed_consumption', 'date')->toArray();

    $labels = array_keys($meterConsumptions); // Assuming both tables have same dates
    $meterData = array_values($meterConsumptions);
    $computedData = array_values($computedConsumptions);
    
    return view('dashboard', compact('labels', 'meterData', 'computedData'));
}


}

