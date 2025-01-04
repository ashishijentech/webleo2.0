<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeviceModelNo;

class ModleNoController extends Controller
{
    public function store(Request $request)
    {
        // dd($request);
        $model_no = new DeviceModelNo;
        $model_no->element_id = $request['element'];
        $model_no->type_id = $request['element_type'];
        $model_no->model_no = $request['model_no'];
        $model_no->voltage = $request['voltage'];
        $model_no->save();
        return redirect()->back()->with('success', 'Device Model Number Added!');

    }
}