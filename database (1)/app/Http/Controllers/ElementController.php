<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Element;
use App\Models\Component;

use App\Services\ElementService;

class ElementController extends Controller
{
    public function __construct(private ElementService $elementService)
    {

    }

    public function index()
    {
        $element = $this->elementService->index();
        $components = Component::all();

        return view('superadmin.createelement')->with(compact('element', 'components'));
    }
    public function store(Request $request)
    {
        $this->elementService->store($request);
        return redirect()->back()->with('success', 'Element created!');
    }
}