<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Component;
class ComponentController extends Controller
{
    public function store(Request $request){
        $component = new Component;
        $component->element_id = $request['elements'];
        $component->name = $request['component_name'];
        $component->value = $request['component_value'];
        $component->save();
        return redirect()->back()->with('success','Component created!');
    }

    public function list($element_id){
        $component = Component::where('element_id',$element_id)->get();
        #dd($component);
        return view('superadmin.componetlist')->with(compact('component'));
    }
}
