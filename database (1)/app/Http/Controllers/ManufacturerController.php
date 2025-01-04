<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManufacturerOnboardRequest;
use Illuminate\Http\Request;
use App\Services\ManufacturerService;
use App\Models\Element;
use App\Models\Component;
use App\Models\ComponentOption;
use App\Models\SubComponentValue_select;
use App\Models\values_subcomponent;
use Carbon\Carbon;
use App\Models\Barcode;


class ManufacturerController extends Controller
{
    protected $manufacturerservice;


    public function __construct(ManufacturerService $manufacturerservice)
    {
        $this->manufacturerservice = $manufacturerservice;
    }

    public function index()
    {
        $list = $this->manufacturerservice->view();
        return view('wlp.manuanufacturerlist')->with(compact('list'));
    }

    public function create()
    {
        return view('wlp.createmanufacturer');
    }

    public function store(ManufacturerOnboardRequest $request)
    {
        $this->manufacturerservice->createManufacturer($request);
        return redirect()->back()->with('success', 'Manufacturer Added!');
    }

    public function dashboard()
    {
        return view('manufacturer.dashboard');
    }

    public function manageBarcode()
    {
        $element = Element::all();
        $currentTime = Carbon::now()->setTimezone('Asia/Kolkata');
        $batchNo = $currentTime->format('YmdHis');
        $barcode = Barcode::with('elementType', 'modelNo', 'partNo')->where('manuf_id', auth()->user()->id)->get();
        return view('manufacturer.managebarcode')->with(compact('element', 'batchNo', 'barcode'));
    }

    public function fetchComponents($id)
    {
        $components = Component::where('element_id', $id)->get();
        $data = $components;
        // $data = ['type' => $components->pluck('type'), 'name' => $components->pluck('name')];
        // foreach ($components as $key => $value) {
        //     if ($components[$key]->type == 'select') {
        //         $data['options'] = ComponentOption::where('name_id', $components[$key]->id)->get();
        //     } else {
        //         $data[] = $components;
        //     }
        // }


        return response()->json($data);

    }

    public function fetchOptions($id)
    {
        $options = ComponentOption::where('name_id', $id)->get();
        return response()->json($options);
    }

    public function fetch_SubComponents($id)
    {
        $subComponents = SubComponentValue_select::where('component_value_id', $id)->get();
        return response()->json($subComponents);
    }

    public function fetch_SubComponents_opt($sub_id)
    {
        $value = values_subcomponent::where('sub_comp_id', $sub_id)->get();
        return response()->json($value);
    }
}