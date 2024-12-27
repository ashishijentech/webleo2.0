<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubComponentValue_select;
use App\Models\values_subcomponent;
class SubcomponentController extends Controller
{
    public function store(Request $request)
    {
        $sub_component = new SubComponentValue_select();
        $sub_component->component_id = $request->component;
        $sub_component->component_value_id = $request->component_values;
        $sub_component->name = $request->sub_component_name;
        $sub_component->type = $request->sub_component_type;
        $sub_component->value = $request->value;
        $sub_component->save();
        // echo $sub_component->id;
        if ($sub_component->type == "select") {
            foreach ($request->options as $value) {
                $values = new values_subcomponent();
                $values->sub_comp_id = $sub_component->id;
                $values->value = $value;
                $values->save();
            }
        }


        return redirect()->back()->with("success", "Sub Component Created!");

    }

    public function list($component_id)
    {
        $subcomponent = SubComponentValue_select::where('component_id', $component_id)->get();
        return view('superadmin.subcomponetlist')->with(compact('subcomponent'));
    }

    public function edit(Request $request ,$id)
    {
        $subcomponent = SubComponentValue_select::find($id);
        $subcomponent->name = $request->input('name');
        $subcomponent->value = $request->input('value');
        $subcomponent->save();
        return redirect()->back()->with('success', 'Sub Component updated!');
    }

    public function destroy($id)
    {
        $subcomponent = SubComponentValue_select::find($id);
        $subcomponent->delete();
        return redirect()->back()->with('success', 'Sub Component deleted!');
    }
}