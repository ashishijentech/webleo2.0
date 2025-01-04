<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DevicePartNo;

class DevicePartNoController extends Controller
{
    public function store(Request $request)
    {
        $partNo = new DevicePartNo;
        $partNo->element_id = $request['element'];
        $partNo->type_id = $request['element_type'];
        $partNo->model_id = $request['model_no'];
        $partNo->part_no = $request['device_part_no'];
        $partNo->save();
        return redirect()->back()->with('success', 'Device Part Number Added!');
    }
}