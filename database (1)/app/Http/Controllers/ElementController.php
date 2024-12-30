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

    public function edit(Request $request, $id)
    {
        $element = Element::find($id);
        $element->name = $request->input('name');
        $element->save();
        return redirect()->back()->with('success', 'Element updated!');
    }

    public function destroy($id)
    {
        $element = Element::find($id);
        $element->delete();
        return redirect()->back()->with('success', 'Element deleted!');
    }

}