<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Element;
class ElementController extends Controller
{
    public function index(){
        $element = Element::all();
        return view('superadmin.createelement')->with(compact('element'));
    }

    public function store(Request $request){
     $element = new Element;
     $element->name = $request['element_name'];
     $element->save();
     return redirect()->back()->with('success','Element created!');
    }
}
