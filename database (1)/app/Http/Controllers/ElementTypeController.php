<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ElementType;

class ElementTypeController extends Controller
{
    public function store(Request $request)
    {
        $type = new ElementType;
        $type->element_id = $request['element'];
        $type->type = $request['type'];
        $type->save();
        return redirect()->back()->with('success', 'Element Type Added!');
    }
}