<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Element;
use App\Services\ElementService;

class ElementController extends Controller
{
    public function __construct(private ElementService $elementService)
    {

    }

    public function index()
    {
        $element = $this->elementService->index();
        return view('superadmin.createelement')->with(compact('element'));
    }
    public function store(Request $request)
    {
        $this->elementService->store($request);
        return redirect()->back()->with('success', 'Element created!');
    }
}