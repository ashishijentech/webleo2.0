<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barcode;
class BarcodeController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        unset($data["_token"]);
        $element_id = $data['element'];
        unset($data["element"]);
        print_r($data);
        echo "<br>";
        #echo $element_id;
        foreach ($data as $key => $value) {
            echo "" . $key . "" . $value . "<br>";
            $barcode = new Barcode();
            $barcode->manuf_id = auth()->user()->id;
            $barcode->element_id = $element_id;
            $barcode->component_id = $key;
            $barcode->value = $value;
            $barcode->save();
        }
        return redirect()->back()->with("success", "Barcode Created!");
    }
}