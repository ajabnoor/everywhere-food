<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $setting = Setting::first(); // Get the single settings row
        return view('home', compact('setting')); // Pass it to the Blade view
    }
}
