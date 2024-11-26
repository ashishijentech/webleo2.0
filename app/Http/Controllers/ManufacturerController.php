<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ManufacturerService;
use App\Models\Element;
use App\Models\Component;

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

    public function store(Request $request)
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
        return view('manufacturer.managebarcode')->with(compact('element'));
    }

    public function fetchComponents($id)
    {
        $components = Component::where('element_id', $id)->get();
        if ($components->isNotEmpty()) {
            return response()->json($components);
        } else {
            return response()->json(['error' => 'Data not found'], 404);
        }
    }
}
