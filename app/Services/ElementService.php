<?php

namespace App\Services;

use App\Models\Element;
use Illuminate\Http\Request;

class ElementService
{
    /**
     * Create a new class instance.
     */
    public function __construct() {}

    public function index()
    {
        return Element::all();
    }

    public function store(Request $request)
    {
        $element = new Element;
        $element->name = $request['element_name'];
        $element->save();
        
    }
}
