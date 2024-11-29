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

<<<<<<< HEAD
    public function index()
    {
        $element = Element::all();
        return $element;
    }

=======
>>>>>>> 85684102c4920c18846aca588ad94955466a8e45
    public function store(Request $request)
    {
        $element = new Element;
        $element->name = $request['element_name'];
        $element->save();
<<<<<<< HEAD
        return redirect()->back()->with('success', 'Element created!');
=======
        
>>>>>>> 85684102c4920c18846aca588ad94955466a8e45
    }
}