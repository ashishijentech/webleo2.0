<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Services\ComponentService;
use Illuminate\Http\Request;
use App\Models\ComponentOption;
class ComponentController extends Controller
{
    public function __construct(private ComponentService $componentService)
    {

    }

    public function store(Request $request)
    {
        return $this->componentService->store($request);
    }

    public function list($element_id)
    {
        return $this->componentService->list($element_id);
    }

    public function fetchcomponentvalue($id)
    {
        $data = ComponentOption::where("name_id", $id)->get();
        return response()->json($data);
    }

    public function edit(Request $request ,$id)
    {
        $element = Component::find($id);
        $element->name = $request->input('name');
        $element->value = $request->input('value');
        $element->save();
        return redirect()->back()->with('success', 'Component updated!');
    }

    public function destroy($id)
    {
        $element = Component::find($id);
        $element->delete();
        return redirect()->back()->with('success', 'Component deleted!');
    }


}