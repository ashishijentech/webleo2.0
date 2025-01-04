<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customfields;

class CustomfieldsController extends Controller
{
    public function store(Request $request)
    {
        $elementId = $request['element'];
        $type_id = $request['element_type'];
        $model_id = $request['model_no'];
        $part_id = $request['device_part_no'];
        $colSize = $request['col'];
        $label = $request['label'];
        $inputType = $request['input_type'];
        foreach ($inputType as $key => $value) {
            $fields = new Customfields;
            $fields->element_id = $elementId;
            $fields->type_id = $type_id;
            $fields->model_id = $model_id;
            $fields->part_id = $part_id;
            $fields->colSize = $colSize[$key];
            $fields->select = $label[$key];
            $fields->inputType = $inputType[$key];
            $fields->save();
        }
        return redirect()->back()->with('success', 'Fields Added!');

    }
}