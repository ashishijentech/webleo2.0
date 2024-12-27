<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barcode;
use App\Models\Distributor;
use App\Models\IMEINO;
use App\Models\Element;
class BarcodeController extends Controller
{

    public function index()
    {
        $barcode = Barcode::where('manuf_id', auth()->user()->id)->get()->groupBy('barcode_no');
        return view('manufacturer.barcode')->with(compact('barcode'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        unset($data["_token"]);
        $element_id = $data['element'];
        $barcode_no = $data['barcode'];
        $imei = new IMEINO;
        $imei->IMEI_NO = $barcode_no;
        $imei->save();
        unset($data["element"]);
        print_r($data);
        echo "<br>";
        #echo $element_id;
        foreach ($data as $key => $value) {
            echo "" . $key . "" . $value . "<br>";
            $barcode = new Barcode();
            $barcode->manuf_id = auth()->user()->id;
            $barcode->element_id = $element_id;
            $barcode->label = $key;
            $barcode->value = $value;
            $barcode->barcode = $imei->id;
            $barcode->save();
        }

        return redirect()->back()->with("success", "Barcode Created!");
    }

    public function allocate()
    {
        $element = Element::all();
        $imei = IMEINO::all();
        $distributer = Distributor::where('manuf_id', auth()->user()->id)->get();
        return view('manufacturer.allocate', compact('distributer', 'element', 'imei'))->render();
    }
}