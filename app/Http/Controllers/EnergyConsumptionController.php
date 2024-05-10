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
       $meterConsumptions = EnergyMeterConsumption::paginate(10);
       $computedConsumptions = EnergyComputedConsumption::paginate(10);
        
        return view('energy.index', compact('meterConsumptions', 'computedConsumptions'));
    }

    public function dashboard()
    {
        // Fetch meter consumptions grouped by day and hour
        $meterConsumptionsHourly = EnergyMeterConsumption::selectRaw('CONCAT(date, " ", time) as datetime, consumption as total_kwh')
            ->orderBy('date', 'asc')
            ->orderBy('time', 'asc')
            ->get();

        // Fetch computed consumptions grouped by day and hour
        $computedConsumptionsHourly = EnergyComputedConsumption::selectRaw('CONCAT(date, " ", time) as datetime, computed_consumption as total_computed')
            ->orderBy('date', 'asc')
            ->orderBy('time', 'asc')
            ->get();

        // Prepare labels and data for the chart
        $labelsHourly = [];
        $meterDataHourly = [];
        $computedDataHourly = [];

        // Loop through the hourly data to populate labels and data arrays
        foreach ($meterConsumptionsHourly as $hourlyData) {
            $labelsHourly[] = $hourlyData->datetime;
            $meterDataHourly[] = $hourlyData->total_kwh;
        }

        foreach ($computedConsumptionsHourly as $hourlyData) {
            $computedDataHourly[] = $hourlyData->total_computed;
        }
    
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
    
        // Prepare labels and data for the daily chart
        $labelsDaily = array_keys($meterConsumptionsDaily);
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
    
        return view('dashboard', compact('labelsHourly', 'meterDataHourly', 'computedDataHourly', 'labelsDaily', 'meterDataDaily', 'computedDataDaily', 'weeklyLabels', 'weeklyMeterData', 'weeklyComputedData'));
    }
    
}   