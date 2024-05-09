<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnergyMeterConsumption;
use App\Models\EnergyComputedConsumption;

class EnergyConsumptionController extends Controller
{
    public function index()
    {
       // Paginate the query results
       $meterConsumptions = EnergyMeterConsumption::paginate(20);
       $computedConsumptions = EnergyComputedConsumption::paginate(20);
        
        return view('energy.index', compact('meterConsumptions', 'computedConsumptions'));
    }

    public function dashboard()
    {
    
        // Fetch meter consumptions grouped by day
        $meterConsumptionsDaily = EnergyMeterConsumption::selectRaw('DATE(date) as date, SUM(consumption) as total_kwh')
            ->groupBy('date')
            ->pluck('total_kwh', 'date')
            ->toArray();
    
        // Fetch computed consumptions grouped by day
        $computedConsumptionsDaily = EnergyComputedConsumption::selectRaw('DATE(date) as date, SUM(computed_consumption) as total_computed')
            ->groupBy('date')
            ->pluck('total_computed', 'date')
            ->toArray();
    
    
        $labelsDaily = array_keys($meterConsumptionsDaily); // Assuming both tables have same dates
        $meterDataDaily = array_values($meterConsumptionsDaily);
        $computedDataDaily = array_values($computedConsumptionsDaily);
        
        
        // Calculate weekly sums
        $weeklyLabels = [];
        $weeklyMeterData = [];
        $weeklyComputedData = [];
        
        $weeks = ceil(count($labelsDaily) / 7);
        
        for ($i = 0; $i < $weeks; $i++) {
            $weekMeterSum = 0;
            $weekComputedSum = 0;
        
            for ($j = $i * 7; $j < min(($i + 1) * 7, count($labelsDaily)); $j++) {
                if (isset($meterDataDaily[$j])) {
                    $weekMeterSum += $meterDataDaily[$j];
                }
        
                if (isset($computedDataDaily[$j])) {
                    $weekComputedSum += $computedDataDaily[$j];
                }
            }
        
            $weeklyLabels[] = "Week " . ($i + 1);
            $weeklyMeterData[] = $weekMeterSum;
            $weeklyComputedData[] = $weekComputedSum;
        }
        
        
        return view('dashboard', compact( 'labelsDaily', 'meterDataDaily', 'computedDataDaily', 'weeklyLabels', 'weeklyMeterData', 'weeklyComputedData'));
    }
 
    
}      