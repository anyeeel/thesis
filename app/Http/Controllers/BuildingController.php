<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index()
    {
        return view('building.index');
    }

    public function create()
    {
        // Your create method logic
    }

    // Other methods like store, show, edit, update, destroy, etc.
}
